<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $origin = $_GET['origin'] ?? 'SGN';
    $destination = $_GET['destination'] ?? 'HAN';
    $departure_date = $_GET['departure_date'] ?? '2025-03-10';

    echo searchFlights($origin, $destination, $departure_date);
} else {
    echo json_encode(["error" => "Chỉ hỗ trợ phương thức GET"]);
}
?>