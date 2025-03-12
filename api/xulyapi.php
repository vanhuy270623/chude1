<?php
require '../config/database.php';
$apiFilePath = __DIR__ . '/api.php';

// Gọi API để lấy dữ liệu JSON
$jsonData = file_get_contents($apiFilePath);
// Kiểm tra xem dữ liệu có được trả về không
// if ($jsonData === FALSE) {
//     die('Error fetching data from API');
// }

// // Chuyển đổi JSON thành mảng PHP
// $flightOffers = json_decode($jsonData, true);

// // Kiểm tra xem có lỗi không
// if (isset($flightOffers['error'])) {
//     die('API Error: ' . $flightOffers['error']);
// }
// foreach($flightOffers['data'] as $offer){
//     $_SESSION['flightOffers'] = $offer;
// }
var_dump($_SESSION['flightOffers']);
// Hiển thị dữ liệu
// echo '<h1>Flight Offers</h1>';
// foreach ($flightOffers['data'] as $offer) {
//     // echo '<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">';
//     echo '<h2>' . $offer['itineraries'][0]['segments'][0]['departure']['iataCode'] . '</p>' ;
//     echo  $offer['itineraries'][0]['segments'][0]['arrival']['iataCode'] . '</h2>';
//     // echo '<p>Departure: ' . $offer['itineraries'][0]['segments'][0]['departure']['at'] . '</p>';
//     // echo '<p>Arrival: ' . $offer['itineraries'][0]['segments'][0]['arrival']['at'] . '</p>';
//     // echo '<p>Price: ' . $offer['price']['total'] . ' ' . $offer['price']['currency'] . '</p>';
//     echo '</div>';
// }
// var_dump($offer['itineraries'][0]['segments'][0]['departure']['iataCode']);//di
// var_dump($offer['itineraries'][0]['segments'][0]['arrival']['iataCode']);//den
// $airportCodes = [];

// foreach ($flightOffers['data'] as $offer) {
//     $departure = $offer['itineraries'][0]['segments'][0]['departure']['iataCode'];
//     $arrival = $offer['itineraries'][0]['segments'][0]['arrival']['iataCode'];

//     $airportCodes[] = $departure;
//     $airportCodes[] = $arrival;
// }

// // Loại bỏ mã trùng
// $uniqueAirports = array_unique($airportCodes);

// // Hiển thị danh sách mã sân bay duy nhất
// echo '<h1>Unique Flight Offers</h1>';
// foreach ($uniqueAirports as $code) {
//     echo "<p>$code</p>";
// }
// // Danh sách ánh xạ mã IATA -> Thành phố
// $airportMapping = [
//     "SYD" => "Sydney",
//     "HAK" => "Haikou",
//     "SIN" => "Singapore",
//     "BKK" => "Bangkok",
//     "MNL" => "Manila",
//     "XMN" => "Xiamen",
//     "HAN" => "Hanoi",
//     "KUL" => "Kuala Lumpur",
//     "HKG" => "Hong Kong",
//     "TFU" => "Chengdu",
//     "MEL" => "Melbourne",
//     "CAN" => "Guangzhou",
//     "SGN" => "Ho Chi Minh City",
//     "AVV" => "Avalon",
//     "ICN" => "Seoul",
//     "BNE" => "Brisbane",
//     "PER" => "Perth",
//     "PEK" => "Beijing",
//     "PVG" => "Shanghai",
//     "CGK" => "Jakarta",
//     "DEL" => "New Delhi"
// ];

// // Mảng lưu dữ liệu theo key-value
// $airportData = [];

// foreach ($airportMapping as $code => $city) {
//     $airportData[$code] = $city;
// }

// // Lưu vào file JSON
// file_put_contents('airport_data.json', json_encode($airportData, JSON_PRETTY_PRINT));

// // Hiển thị dữ liệu
// header('Content-Type: application/json');
// echo json_encode($airportData, JSON_PRETTY_PRINT);
