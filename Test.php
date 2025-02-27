<?php
require 'config/database.php';

var_dump($_POST);
$departure = $_POST['departure'];
$return = $_POST['return'];
$passengers = $_POST['passengers'];
var_dump($Costf[0]['NgayBay']);
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

<form method="post" action="hoadon.php">
    <table>
        <tr>
            <th>Giờ Khởi Hành</th>
            <th>Giờ Đến</th>
            <th>Thời Gian Dự Kiến</th>
            <th>Điểm Đi</th>
            <th>Điểm Đến</th>
            <th>Hãng</th>
            <th>Ngày Bay</th>
            <th>Giá Tiền (VNĐ)</th>
            <th>Tổng Tiền</th>
            <th>Đặt vé</th>
        </tr>

        <?php
        foreach ($Costf as $value) {
            if ($value['NgayBay'] == $departure || $value['NgayBay'] == $return) {
                echo "<tr>";
                
                // Checkbox để chọn chuyến bay
                // Hiển thị thông tin và thêm input ẩn để gửi dữ liệu
                echo "<td>{$value['GioKhoiHanh']}<input type='hidden' name='chuyenbay[GioKhoiHanh]' value='{$value['GioKhoiHanh']}'></td>";
                echo "<td>{$value['GioDen']}<input type='hidden' name='chuyenbay[GioDen]' value='{$value['GioDen']}'></td>";
                echo "<td>{$value['ThoiGianDuKien']}<input type='hidden' name='chuyenbay[ThoiGianDuKien]' value='{$value['ThoiGianDuKien']}'></td>";
                echo "<td>{$value['DDi']}<input type='hidden' name='chuyenbay[DDi]' value='{$value['DDi']}'></td>";
                echo "<td>{$value['DDen']}<input type='hidden' name='chuyenbay[DDen]' value='{$value['DDen']}'></td>";
                echo "<td>{$value['IDHang']}<input type='hidden' name='chuyenbay[IDHang]' value='{$value['IDHang']}'></td>";
                echo "<td>{$value['NgayBay']}<input type='hidden' name='chuyenbay[NgayBay]' value='{$value['NgayBay']}'></td>";
                echo "<td>" . number_format($value['GiaTien']) . " VND <input type='hidden' name='chuyenbay[GiaTien]' value='{$value['GiaTien']}'></td>";
                echo "<td>" . number_format($value['GiaTien'] * $passengers) . " VND <input type='hidden' name='TongTien' value='" . ($value['GiaTien'] * $passengers) . "'></td>";
                echo "<input type='hidden' name='passengers' value='$passengers'>";
                echo "<td><button type='submit' class='book-btn'>Đặt vé</button></td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
 </form>