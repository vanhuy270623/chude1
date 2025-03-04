<?php

// Kết nối đến database
require_once 'config/database.php';

// Kiểm tra phương thức request
$method = $_SERVER['REQUEST_METHOD'];
$action = $_GET['action'] ?? '';

header('Content-Type: application/json');

if ($method === 'GET' && $action === 'timkiem') {
    try {
        // Lấy tham số tìm kiếm
        $diemDi = $_GET['DDi'] ?? '';
        $diemDen = $_GET['DDen'] ?? '';
        $ngayKhoiHanh = $_GET['NgayBay'] ?? '';

        // Kiểm tra nếu cả ba tham số đều có giá trị mới thực hiện truy vấn
        if (!empty($diemDi) && !empty($diemDen) && !empty($ngayKhoiHanh)) {
            $query = "SELECT * FROM chuyenbay WHERE DDi = ? AND DDen = ? AND NgayBay = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$diemDi, $diemDen, $ngayKhoiHanh]);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $data = ["error" => "Vui lòng cung cấp đầy đủ điểm đi, điểm đến và ngày bay"];
        }
        
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    } catch (PDOException $e) {
        echo json_encode(["error" => "Lỗi truy vấn: " . $e->getMessage()]);
    }
} elseif ($method === 'POST' && $action === 'luuhoadon') {
    try {
        // Nhận dữ liệu từ request body
        $input = json_decode(file_get_contents("php://input"), true);

        if (!isset($input['IDChuyenBay'], $input['TenKhachHang'], $input['SoTien'], $input['NgayTao'], $input['PhuongThucThanhToan'], $input['TrangThai'])) {
            echo json_encode(["error" => "Thiếu dữ liệu hóa đơn"]);
            exit;
        }

        $query = "INSERT INTO hoadon (IDChuyenBay, TenKhachHang, SoTien, NgayTao, PhuongThucThanhToan, TrangThai) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([
            $input['IDChuyenBay'],
            $input['TenKhachHang'],
            $input['SoTien'],
            $input['NgayTao'],
            $input['PhuongThucThanhToan'],
            $input['TrangThai']
        ]);

        echo json_encode(["success" => true, "message" => "Hóa đơn đã được lưu"]);
    } catch (PDOException $e) {
        echo json_encode(["error" => "Lỗi lưu hóa đơn: " . $e->getMessage()]);
    }
} elseif ($method === 'POST' && $action === 'dangky') {
    try {
        $input = json_decode(file_get_contents("php://input"), true);
        if (!isset($input['TenDangNhap'], $input['MatKhau'])) {
            echo json_encode(["error" => "Thiếu tên đăng nhập hoặc mật khẩu"]);
            exit;
        }

        // Mã hóa mật khẩu bằng MD5
        $hashedPassword = md5($input['MatKhau']);

        $query = "INSERT INTO nguoidung (TenDangNhap, MatKhau) VALUES (?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$input['TenDangNhap'], $hashedPassword]);

        echo json_encode(["success" => true, "message" => "Đăng ký thành công"]);
    } catch (PDOException $e) {
        echo json_encode(["error" => "Lỗi đăng ký: " . $e->getMessage()]);
    }
} elseif ($method === 'POST' && $action === 'dangnhap') {
    try {
        $input = json_decode(file_get_contents("php://input"), true);
        if (!isset($input['TenDangNhap'], $input['MatKhau'])) {
            echo json_encode(["error" => "Thiếu tên đăng nhập hoặc mật khẩu"]);
            exit;
        }

        $query = "SELECT * FROM nguoidung WHERE TenDangNhap = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$input['TenDangNhap']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $user['MatKhau'] === md5($input['MatKhau'])) {
            echo json_encode(["success" => true, "message" => "Đăng nhập thành công", "user" => $user]);
        } else {
            echo json_encode(["error" => "Sai tên đăng nhập hoặc mật khẩu"]);
        }
    } catch (PDOException $e) {
        echo json_encode(["error" => "Lỗi đăng nhập: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["error" => "Yêu cầu không hợp lệ"]);
}

?>