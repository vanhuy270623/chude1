<?php
require "database.php";
require 'config.php';
use GuzzleHttp\Client;

function getAccessToken() {
    $client = new Client([
        'verify' => false, // Tắt kiểm tra SSL
    ]);

    try {
        $response = $client->post(API_URL . '/auth/token', [
            'form_params' => [
                'api_key' => API_KEY,
                'api_secret' => API_SECRET,
            ]
        ]);
        $data = json_decode($response->getBody(), true);
        return $data['access_token'] ?? null;
    } catch (Exception $e) {
        die('Lỗi lấy token: ' . $e->getMessage());
    }
}

?>
