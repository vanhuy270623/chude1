<?php
require 'get_token.php';
use GuzzleHttp\Client;

function searchFlight($from, $to, $date) {
    $client = new Client();
    $token = getAccessToken();

    try {
        $response = $client->get(API_URL . '/flights/search', [
            'headers' => [
                'Authorization' => "Bearer $token",
                'Accept' => 'application/json'
            ],
            'query' => [
                'origin' => $from,
                'destination' => $to,
                'date' => $date
            ]
        ]);
        return json_decode($response->getBody(), true);
    } catch (Exception $e) {
        return ['error' => $e->getMessage()];
    }
}

// Test API với Postman
header('Content-Type: application/json');
echo json_encode(searchFlight('HAN', 'SGN', '2025-03-10'));
