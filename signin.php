<?php
require_once 'config/database.php'; // Kết nối database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'login') {
            $username = $_POST["username"];
            $password = md5($_POST["password"]);
            $result = $pdo->prepare("select * from taikhoan where TenDN=:tendn and MatKhau=:pass");
            $result->bindValue("tendn", $username);
            $result->bindValue("pass", $password);
            $result->execute();
            $row = $result->fetch(PDO::FETCH_ASSOC);
            var_dump($row);
            if ($row) {
                $_SESSION['login'] = $row['TenDN'];
                header("Location: index.php");
            } else {
                $loi = '<p style="color:red">Ten dang nhap hoac mat khau khong dung';
            }
        } elseif ($_POST['action'] == 'register') {
            // 🔵 Xử lý đăng ký
            $username = trim($_POST["username"]);
            $email = trim($_POST["email"]);
            $password = trim($_POST["password"]);

           
            // Mã hóa mật khẩu an toàn
            $hashed_password = md5($password);

            // Thêm tài khoản vào database
            $stmt = $pdo->prepare("INSERT INTO taikhoan (TenDN, MatKhau, Email) VALUES (?, ?, ?)");
            if ($stmt->execute([$username, $hashed_password, $email])) {
                $_SESSION['login'] = $username;
                $_SESSION['message'] = "Đăng ký thành công!";
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['error'] = "Đăng ký thất bại, vui lòng thử lại!";
                header("Location: login.php");
                exit();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/signin.css">
    <title>AirTravel Login Page</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="post">
                <h1>Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="hidden" name="action" value="register">
                <input type="text" name="username" placeholder="Name">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="post">
                <h1>Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your email password</span>
                <input type="hidden" name="action" value="login">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <a href="#">Forgot Your Password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>

</html>