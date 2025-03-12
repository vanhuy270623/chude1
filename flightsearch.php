<?php
include 'header.php';
?>
<?php

require_once 'config/database.php';
// var_dump($_SESSION['flightOffers']);
// Kiểm tra xem dữ liệu có được trả về không
if (isset($_SESSION['flightOffers']) == FALSE) {
    die('Error fetching data from API');
}

$flightOffers=$_SESSION['flightOffers'];



?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Flight Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="css/flightsearch.css">
</head>
<script>
     function redirectToPassenger(button) {
        let flightDiv = button.closest('.flight-info');
        let form = document.createElement('form');
        form.method = "POST";
        form.action = "passengerif.php";

        let inputs = flightDiv.querySelectorAll("input[type=hidden]");
        inputs.forEach(input => {
            let hiddenField = document.createElement("input");
            hiddenField.type = "hidden";
            hiddenField.name = input.name;
            hiddenField.value = input.value;
            form.appendChild(hiddenField);
        });

        document.body.appendChild(form);
        form.submit();
    }
</script>

<body>
    <div class="flight-container">
        <div class="flight-header">
            <div class="flex justify-between items-center px-4">
                <div class="text-lg font-bold">Hồ Chí Minh</div>
                <div class="text-lg font-bold">Hà Nội</div>
            </div>
        </div>
        <div class="flight-details">
            <div class="flex justify-between items-center border-b px-4 py-2">
                <button class="day-button">Thứ 5<br />27/02</button>
                <button class="day-button">Thứ 6<br />28/02</button>
                <button class="day-button">Thứ 7<br />01/03</button>
                <button class="day-button">Chủ nhật<br />02/03</button>
                <button class="day-button">Thứ 2<br />03/03</button>
                <button class="day-button">Thứ 3<br />04/03</button>
                <button class="day-button">Thứ 4<br />05/03</button>
            </div>
            <div class="p-4">
                <?php if (!empty($flightOffers)): ?>
                    <?php foreach ($flightOffers as $offer): 
                        // var_dump($offer)
                        ?>
                        
                        <div class="flight-info">
                            <img alt="Vietjet Air logo" src="https://storage.googleapis.com/a1aa/image/Oq1tCQqOOQr42yWO3DYuRyfepECFjP0k4EmmrpDGrPI.jpg" />
                            <div class="details">
                                <div class="font-bold"><?= $offer['itineraries'][0]['segments'][0]['carrierCode'] . $offer['itineraries'][0]['segments'][0]['number']?> - <?= $offer['itineraries'][0]['segments'][0]['aircraft']['code'] ?></div>
                                <div class="text-sm text-gray-500">
                                    <?= $offer['itineraries'][0]['segments'][0]['departure']['at'] ?> <?= $offer['itineraries'][0]['segments'][0]['departure']['iataCode'] ?>
                                    <i class="fas fa-arrow-right mx-2"></i>
                                    <?=  $offer['itineraries'][0]['segments'][0]['arrival']['at'] ?> <?=  $offer['itineraries'][0]['segments'][0]['arrival']['iataCode']?>
                                </div>
                                <div class="text-sm text-gray-500"><?= $offer['itineraries'][0]['segments'][0]['duration'] ?> Bay thẳng</div>
                                <input type="hidden" name="chuyenbay[GioKhoiHanh]" value="<?= $offer['itineraries'][0]['segments'][0]['departure']['at'] ?>">
                                <input type="hidden" name="chuyenbay[GioDen]" value="<?= $offer['itineraries'][0]['segments'][0]['arrival']['at'] ?>">
                                <input type="hidden" name="chuyenbay[ThoiGianDuKien]" value="<?= $offer['itineraries'][0]['segments'][0]['duration'] ?>">
                                <input type="hidden" name="chuyenbay[DDi]" value="<?= $offer['itineraries'][0]['segments'][0]['departure']['iataCode'] ?>">
                                <input type="hidden" name="chuyenbay[DDen]" value="<?= $offer['itineraries'][0]['segments'][0]['arrival']['iataCode'] ?>">
                                <input type="hidden" name="chuyenbay[IDHang]" value="<?= $offer['itineraries'][0]['segments'][0]['carrierCode'] . $offer['itineraries'][0]['segments'][0]['number']?>">
                                <input type="hidden" name="chuyenbay[NgayBay]" value="<?= $offer['itineraries'][0]['segments'][0]['departure']['at']?>">
                                <input type="hidden" name="chuyenbay[GiaTien]" value="<?= $offer['price']['total'] ?>">
                                <input type="hidden" name="TongTien" value="<?= $offer['price']['total'] * $_SESSION['flights']['SoHanhKhach'] ?>">
                                <input type="hidden" name="passengers" value="<?= $_SESSION['flights']['SoHanhKhach'] ?>">
                            </div>
                            <div class="price">
                                <div class="text-lg font-bold text-blue-600">
                                    <?= $offer['price']['total'] * $_SESSION['flights']['SoHanhKhach'] ?> EUR
                                </div>
                                <div class="text-sm text-gray-500">Tổng thành tiền</div>
                                <button onclick="redirectToPassenger(this)">CHỌN</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Không tìm thấy chuyến bay phù hợp.</p>
                <?php endif; ?>

            </div>
        </div>
    </div>
</body>

</html>
