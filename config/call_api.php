<?php
require 'get_token.php';

$accessToken = $result['access_token'];  // Token lấy từ get_token.php
$endpoint = "https://test.api.amadeus.com/v1/reference-data/locations?keyword=PAR&subType=CITY";

$options = [
    'http' => [
        'header'  => "Authorization: Bearer $accessToken\r\n",
        'method'  => 'GET'
    ]
];

$context  = stream_context_create($options);
$response = file_get_contents($endpoint, false, $context);
$data = json_decode($response, true);

echo "<pre>";
print_r($data);
echo "</pre>";
?>
