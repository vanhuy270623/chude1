<?php
require '../config/database.php';
require '../vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? '';

// header('Content-Type: application/json');
// var_dump($_GET);
if ($method === 'GET') {
    try {
        $flights = [];
        $flights['DiemDi'] = $_GET['DDi'] ?? '';
        $flights['DiemDen'] = $_GET['DDen'] ?? '';
        $flights['NgayKhoiHanh'] = $_GET['NgayBay'] ?? '';
        $flights['SoHanhKhach'] = $_GET['passengers'] ?? '';
        $_SESSION['flights'] = $flights; 
    } catch (PDOException $e) {
        $flights = [];
    }
    // var_dump($flights);
}

use Dotenv\Dotenv;
use GuzzleHttp\Client;

// Load environment variables from .env fileF
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Amadeus API credentials
$clientId = $_ENV['AMADEUS_CLIENT_ID'];
$clientSecret = $_ENV['AMADEUS_CLIENT_SECRET'];

// Amadeus API endpoints
$tokenUrl = 'https://test.api.amadeus.com/v1/security/oauth2/token';
$flightOffersUrl = 'https://test.api.amadeus.com/v2/shopping/flight-offers';

// File to store token and expiration time
$tokenFile = __DIR__ . '/amadeus_token.json';

// Function to get or refresh the access token
function getAccessToken($client, $tokenUrl, $clientId, $clientSecret, $tokenFile)
{
    if (file_exists($tokenFile)) {
        $tokenData = json_decode(file_get_contents($tokenFile), true);
        $expiresAt = $tokenData['expires_at'];

        // Check if the token is still valid
        if (time() < $expiresAt) {
            return $tokenData['access_token'];
        }
    }

    // Request a new token
    try {
        $response = $client->post($tokenUrl, [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
            ],
        ]);

        $tokenData = json_decode($response->getBody(), true);
        $tokenData['expires_at'] = time() + $tokenData['expires_in']; // Calculate expiration time

        // Save the new token to file
        file_put_contents($tokenFile, json_encode($tokenData));

        return $tokenData['access_token'];
    } catch (Exception $e) {
        die('Error fetching access token: ' . $e->getMessage());
    }
}

// Initialize Guzzle client with SSL verification disabled
$client = new Client([
    'verify' => false, // Tắt xác minh SSL
]);

// Get or refresh the access token
$accessToken = getAccessToken($client, $tokenUrl, $clientId, $clientSecret, $tokenFile);

// Use the access token to get flight offers
try {
    $flightOffersResponse = $client->get($flightOffersUrl, [
        'headers' => [
            'Authorization' => 'Bearer ' . $accessToken,
        ],
        'query' => [
            'originLocationCode' => $flights['DiemDi'],
            'destinationLocationCode' =>  $flights['DiemDen'],
            'departureDate' => $flights['NgayKhoiHanh'],
            'adults' => $flights['SoHanhKhach'],
            'max' => 5,

        ],
    ]);

    $flightOffersData = json_decode($flightOffersResponse->getBody(), true);
    foreach($flightOffersData['data'] as $offer){
        $_SESSION['flightOffers'][] = $offer;
    }
    // Trả về dữ liệu dưới dạng JSON
    
    header('Content-Type: application/json');
    // echo json_encode($flightOffersData);
    if (!empty($_SESSION['flightOffers'])) {
        header("Location: ../flightsearch.php");
        exit();
    } else {
        echo json_encode(['error' => 'Không tìm thấy chuyến bay']);
    }
} catch (Exception $e) {
    // Trả về lỗi dưới dạng JSON
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Error fetching flight offers: ' . $e->getMessage()]);
}
