<?php
// Kết nối đến database
require_once 'config/database.php';

// Kiểm tra phương thức request
$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? '';

if ($method === 'POST') {
    try {
        // Lấy dữ liệu từ form
        $passengers = $_POST['passengers'];
        $contact = $_POST['contact'];
        $chuyenbay = $_POST['Tienve'];

        // Tạo ID chuyến bay


        $idChuyenBay = $chuyenbay['TongTien'] * $chuyenbay['IDHang'] - $chuyenbay['sove'];

        $stmt_check = $pdo->prepare("SELECT COUNT(*) FROM dat_ve WHERE chuyenbay_id = ?");
        $stmt_check->execute([$idChuyenBay]);
        $exists = $stmt_check->fetchColumn();
        if ($exists == 0) { // Nếu chưa tồn tại, mới chèn
            var_dump($idChuyenBay);
            $stmt = $pdo->prepare("INSERT INTO dat_ve (chuyenbay_id, tong_tien, so_ve, ngay_dat) VALUES (?, ?, ?, ?)");
            $stmt->execute([$idChuyenBay, $chuyenbay['TongTien'], $chuyenbay['sove'], $chuyenbay['IDHang']]);
        }

        $booking_id = $chuyenbay['DDi'] . ' - ' . rand(1, 10000);

        function taoMaDatGhe($maChuyenBay, $hangGhe, $soGhe)
        {
            return "{$maChuyenBay}-{$hangGhe}{$soGhe}-" . strtoupper(substr(md5(uniqid()), 0, 4));
        }

        // Lưu thông tin hành khách
        foreach ($passengers as $passenger) {
            // Kiểm tra hành khách đã tồn tại chưa (dựa vào số ID)
            $stmt = $pdo->prepare("SELECT id FROM nguoidung WHERE IDTaiKhoan = ?");
            $stmt->execute([$passenger['id_number']]);
            $existingUser = $stmt->fetch();

            if (!$existingUser) { // Chỉ thêm nếu chưa có
                $gioiTinh = ($passenger['Nam'] == "1") ? 1 : 0;
                $ngaysinh = sprintf("%04d-%02d-%02d", $passenger['dob_year'], $passenger['dob_month'], $passenger['dob_day']);
                $maDatGhe = taoMaDatGhe($idChuyenBay, "B", rand(1, 30));

                $stmt = $pdo->prepare("INSERT INTO nguoidung (TenND, GT, NgaySinh, IDTaiKhoan, ma_dat_ghe) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$passenger['fullname'], $gioiTinh, $ngaysinh, $passenger['id_number'], $maDatGhe]);
            }
        }

        // Thông báo đặt vé thành công
        echo "<script>alert('Đặt vé thành công!'); window.location.href='trang_chu.php';</script>";
        exit;
    } catch (PDOException $e) {
        echo "<script>alert('Lỗi: " . $e->getMessage() . "');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn chuyến bay</title>
    <link rel="stylesheet" href="css/detail.css">
</head>

<body>
    <div class="container">
        <!-- Tiêu đề và Logo -->
        <header>
            <img src="logo.png" alt="Logo hãng hàng không" class="logo">
            <h1>Hóa đơn chuyến bay</h1>
        </header>

        <!-- Bố cục 2 cột -->
        <div class="columns">
            <div class="left-column">
                <section class="flight-info">
                    <h2>Thông tin chuyến bay</h2>
                    <p><strong>Mã đặt chỗ:</strong> <?= $booking_id ?></p>
                    <div class="passenger-info">
                        <h3>Thông tin hành khách</h3>
                        <p><strong>Họ và tên:</strong> <?= $contact['fullname'] ?></p>
                        <p><strong>Số điện thoại:</strong> <?= $contact['phone'] ?></p>
                        <p><strong>Email:</strong> <?= $contact['email'] ?></p>
                    </div>
                    <div class="flight-details">
                        <h3>Chi tiết chuyến bay</h3>
                        <p><strong>Số vé:</strong> <?= $chuyenbay['sove'] ?></p>
                        <p><strong>Ngày khởi hành:</strong> <?= $chuyenbay['NgayBay'] ?></p>
                        <p><strong>Giờ khởi hành:</strong> <?= $chuyenbay['GioKhoiHanh'] ?></p>
                        <p><strong>Giờ đến:</strong> <?= $chuyenbay['GioDen'] ?></p>
                        <p><strong>Sân bay đi:</strong> <?= $chuyenbay['DDi'] ?></p>
                        <p><strong>Sân bay đến:</strong> <?= $chuyenbay['DDen'] ?></p>
                        <p><strong>Thời gian bay:</strong> <?= $chuyenbay['ThoiGianDuKien'] ?></p>
                    </div>
                </section>
            </div>

            <div class="right-column">
                <section class="payment-info">
                    <h2>Thông tin thanh toán</h2>
                    <p><strong>Tổng chi phí:</strong> <?= number_format($chuyenbay['TongTien']) ?> VND</p>
                    <p><strong>Phương thức thanh toán:</strong> Thẻ tín dụng</p>

                </section>

                <section class="additional-info">
                    <h2>Thông tin bổ sung</h2>
                    <p><a href="#">Điều khoản và điều kiện</a></p>
                    <p><strong>Hỗ trợ khách hàng:</strong> 1900 1234 - support@airline.com</p>
                </section>

                <section class="actions">
                    <button onclick="window.print()">In hóa đơn</button>
                    <button onclick="sendEmail()">Gửi email</button>
                    <button onclick="window.location.href='index.php'">Quay lại trang chủ</button>
                </section>
            </div>
        </div>

        <!-- Footer -->
        <footer>
            <p>Thanh toán thành công!</p>
            <img src="https://img.icons8.com/ios-filled/50/000000/lock.png" alt="Biểu tượng bảo mật">
        </footer>
    </div>
</body>

<script>
    function sendEmail() {
        alert("Hóa đơn đã được gửi đến email của bạn!");
    }
</script>
</body>

</html>