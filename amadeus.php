<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Dotenv\Dotenv;

// Load biến môi trường từ file .env
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$apiKey = $_ENV['API_KEY'];
$apiSecret = $_ENV['API_SECRET'];
$token = $_ENV['TOKEN'];
$baseUrl = $_ENV['BASE_URL'];

$client = new Client();

// Gọi API để kiểm tra xác thực token
$response = $client->request('GET', "$baseUrl/v1/security/oauth2/token", [
    'headers' => [
        'Authorization' => "Bearer $token",
        'Content-Type' => 'application/x-www-form-urlencoded'
    ],
    'form_params' => [
        'grant_type' => 'client_credentials',
        'client_id' => $apiKey,
        'client_secret' => $apiSecret,
    ]
]);

$statusCode = $response->getStatusCode();
$body = json_decode($response->getBody(), true);

if ($statusCode == 200) {
    echo "Kết nối thành công! Token: " . $body['access_token'];
} else {
    echo "Lỗi: " . $body['error_description'];
}
?>
