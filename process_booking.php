<?php
require "config/database.php";
var_dump($_POST);
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
                    <p><strong>Mã đặt chỗ:</strong> ABC123</p>
                    <div class="passenger-info">
                        <h3>Thông tin hành khách</h3>
                        <p><strong>Họ và tên:</strong> Nguyễn Văn A</p>
                        <p><strong>Số điện thoại:</strong> 0123456789</p>
                        <p><strong>Email:</strong> nguyenvana@example.com</p>
                    </div>
                    <div class="flight-details">
                        <h3>Chi tiết chuyến bay</h3>
                        <p><strong>Số hiệu chuyến bay:</strong> VN123</p>
                        <p><strong>Ngày và giờ khởi hành:</strong> 10/10/2023 - 14:00</p>
                        <p><strong>Sân bay đi:</strong> Tân Sơn Nhất (SGN)</p>
                        <p><strong>Sân bay đến:</strong> Nội Bài (HAN)</p>
                        <p><strong>Thời gian bay:</strong> 2 giờ</p>
                        <p><strong>Hạng vé:</strong> Economy</p>
                    </div>
                    <div class="luggage-info">
                        <h3>Thông tin hành lý</h3>
                        <p><strong>Hành lý ký gửi:</strong> 20kg</p>
                        <p><strong>Hành lý xách tay:</strong> 7kg</p>
                    </div>
                </section>
            </div>

            <div class="right-column">
                <section class="payment-info">
                    <h2>Thông tin thanh toán</h2>
                    <p><strong>Tổng chi phí:</strong> 2,500,000 VND</p>
                    <p><strong>Phương thức thanh toán:</strong> Thẻ tín dụng</p>
                    <div class="payment-details">
                        <h3>Chi tiết thanh toán</h3>
                        <p><strong>Giá vé:</strong> 2,000,000 VND</p>
                        <p><strong>Thuế:</strong> 300,000 VND</p>
                        <p><strong>Phí dịch vụ:</strong> 200,000 VND</p>
                    </div>
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
