<?php
var_dump($_POST);
require 'config/database.php';

$departure = $_POST['departure'];
$return = $_POST['return'];
$passengers = $_POST['passengers'];
$from=$_POST['from'];
$to=$_POST['to'];
//     foreach($Costf as $value){
//         if($value['NgayBay']==$departure||$value['NgayBay']==$return){
//         // var_dump($value);
//         echo $value['GioKhoiHanh'];
//         echo $value['GioDen'];
//         echo $value['ThoiGianDuKien'];
//         echo $value['DDi'];
//         echo $value['DDen'];
//         echo $value['IDHang'];
//         echo $value['NgayBay'];
//         echo $value['GiaTien']. "<br>";

//     }
// }

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
    function redirectToPassenger() {
        window.location.href = "passengerif.php";
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
                <form method="post" action="passengerif.php">
                    <table>
                        <?php
                        foreach ($Costf as $value) {
                            if ($value['NgayBay'] == $departure || $value['NgayBay'] == $return) {
                                if($value['DDi']==$from&& $value['DDen']==$to||$value['DDi']==$to&& $value['DDen']==$from){
                        ?>
                                <div class="flight-info">
                                    <img alt="Vietjet Air logo"
                                        src="https://storage.googleapis.com/a1aa/image/Oq1tCQqOOQr42yWO3DYuRyfepECFjP0k4EmmrpDGrPI.jpg" />
                                    <div class="details">
                                        <div class="font-bold"><?= $value['TenHang'] ?> - <?= $value['MaMayBay'] ?></div>
                                        <div class="text-sm text-gray-500"><?= $value['GioKhoiHanh'] ?> <?= $value['DDi'] ?><i class="fas fa-arrow-right mx-2"></i> <?= $value['GioDen'] ?> <?= $value['DDen'] ?>
                                        </div>
                                        <div class="text-sm text-gray-500"><?= $value['ThoiGianDuKien'] ?> Bay thẳng</div>
                                        <input type="hidden" name="chuyenbay[GioKhoiHanh]" value="<?= $value['GioKhoiHanh'] ?>">
                                        <input type="hidden" name="chuyenbay[GioDen]" value="<?= $value['GioDen'] ?>">
                                        <input type="hidden" name="chuyenbay[ThoiGianDuKien]" value="<?= $value['ThoiGianDuKien'] ?>">
                                        <input type="hidden" name="chuyenbay[DDi]" value="<?= $value['DDi'] ?>">
                                        <input type="hidden" name="chuyenbay[DDen]" value="<?= $value['DDen'] ?>">
                                        <input type="hidden" name="chuyenbay[IDHang]" value="<?= $value['IDHang'] ?>">
                                        <input type="hidden" name="chuyenbay[NgayBay]" value="<?= $value['NgayBay'] ?>">
                                        <input type="hidden" name="chuyenbay[GiaTien]" value="<?= $value['GiaTien'] ?>">
                                        <input type="hidden" name="TongTien" value="<?= $value['GiaTien'] * $passengers ?>">
                                        <input type="hidden" name="passengers" value="<?= $passengers ?>">
                                    </div>
                                    <div class="price">
                                        <div class="text-lg font-bold text-blue-600"><?= number_format($value['GiaTien'] * $passengers) ?> VND</div>
                                        <div class="text-sm text-gray-500">Tổng thành tiền</div>
                                        <button onclick="redirectToPassenger()">CHỌN</button>
                                    </div>
                                </div>
                        <?php
                                }
                            }
                        }
                        ?>
                    </table>
                </form>

            </div>
        </div>
    </div>
</body>

</html>