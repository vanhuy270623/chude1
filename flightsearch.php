<?php
include 'header.php';
?>
<?php

// Kết nối đến database
require_once 'config/database.php';

// Kiểm tra phương thức request
$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? '';

// header('Content-Type: application/json');

if ($method === 'GET' && $action === 'timkiem') {
    try {
        // Lấy tham số tìm kiếm
        $diemDi = $_GET['DDi'] ?? '';
        $diemDen = $_GET['DDen'] ?? '';
        $ngayKhoiHanh = $_GET['NgayBay'] ?? '';

        // Kiểm tra nếu cả ba tham số đều có giá trị mới thực hiện truy vấn
        if (!empty($diemDi) && !empty($diemDen) && !empty($ngayKhoiHanh)) {
            $query = "SELECT chuyenbay.*, hangbay.TenHang, hangbay.MaMayBay 
                      FROM chuyenbay 
                      JOIN hangbay ON chuyenbay.IDHang = hangbay.IDHang 
                      WHERE chuyenbay.DDi = ? AND chuyenbay.DDen = ? AND chuyenbay.NgayBay = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$diemDi, $diemDen, $ngayKhoiHanh]);
            $flights = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $flights = [];
        }
    } catch (PDOException $e) {
        $flights = [];
    }
    // var_dump($flights);
}

//// chạy api test cho mọi người coi

// header('Content-Type: application/json');

// if ($method === 'GET' && $action === 'timkiem') {
//     try {
//         // Lấy tham số tìm kiếm
//         $diemDi = $_GET['DDi'] ?? '';
//         $diemDen = $_GET['DDen'] ?? '';
//         $ngayKhoiHanh = $_GET['NgayBay'] ?? '';

//         // Kiểm tra nếu cả ba tham số đều có giá trị mới thực hiện truy vấn
//         // if (!empty($diemDi) && !empty($diemDen) && !empty($ngayKhoiHanh)) {
//             $query = "SELECT chuyenbay.*, hangbay.TenHang, hangbay.MaMayBay 
//                       FROM chuyenbay 
//                       JOIN hangbay ON chuyenbay.IDHang = hangbay.IDHang 
//                     --   WHERE chuyenbay.DDi = ? AND chuyenbay.DDen = ? AND chuyenbay.NgayBay = ?
//                     ";
//             $stmt = $pdo->prepare($query);
//             $stmt->execute();
//             $flights = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         // } else {
//         //     $flights = [];
//         // }

//         // Trả về dữ liệu dưới dạng JSON
//         echo json_encode([
//             'status' => 'success',
//             'data' => $flights
//         ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//     } 
//     catch (PDOException $e) {
//         echo json_encode([
//             'status' => 'error',
//             'message' => 'Lỗi kết nối database: ' . $e->getMessage()
//         ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
//     }
// }
// exit;
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
                <?php if (!empty($flights)): ?>
                    <?php foreach ($flights as $value): ?>
                        <div class="flight-info">
                            <img alt="Vietjet Air logo" src="https://storage.googleapis.com/a1aa/image/Oq1tCQqOOQr42yWO3DYuRyfepECFjP0k4EmmrpDGrPI.jpg" />
                            <div class="details">
                                <div class="font-bold"><?= $value['TenHang'] ?> - <?= $value['MaMayBay'] ?></div>
                                <div class="text-sm text-gray-500">
                                    <?= $value['GioKhoiHanh'] ?> <?= $value['DDi'] ?>
                                    <i class="fas fa-arrow-right mx-2"></i>
                                    <?= $value['GioDen'] ?> <?= $value['DDen'] ?>
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
                                <input type="hidden" name="TongTien" value="<?= $value['GiaTien'] * $_GET['passengers'] ?>">
                                <input type="hidden" name="passengers" value="<?= $_GET['passengers'] ?>">
                            </div>
                            <div class="price">
                                <div class="text-lg font-bold text-blue-600">
                                    <?= number_format($value['GiaTien'] * $_GET['passengers']) ?> VND
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
