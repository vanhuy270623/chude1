<?php
require 'config/database.php';

    if ($_POST) {
        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        try {
            // 🔍 Kiểm tra xem username đã tồn tại chưa
            $check = $pdo->prepare("SELECT * FROM taikhoan WHERE TenDN = ?");
            $check->execute([$username]);
    
            if ($check->rowCount() > 0) {
                die("Tên đăng nhập đã tồn tại! Vui lòng chọn tên khác.");
            }
    
            // ✅ Nếu chưa tồn tại, mã hóa mật khẩu và lưu vào database
          
            $stmt = $pdo->prepare("INSERT INTO taikhoan (TenDN, MatKhau) VALUES (?, ?)");
            $stmt->execute([$username, $password]);

            // Đăng ký thành công, lưu session và chuyển hướng
            $_SESSION['login'] = $username;
            header("Location: index.php");
            exit();
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
    ?>