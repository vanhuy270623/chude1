<?php
include 'header.php';
var_dump($_POST);
$diemDi = $_POST['diemDi'] ?? '';
$diemDen = $_POST['diemDen'] ?? '';
$ngayDi = $_POST['ngayDi'] ?? '';
$ngayVe = $_POST['ngayVe'] ?? '';

$sql = "SELECT * FROM chuyenbay WHERE DDi = :diemDi AND DDen = :diemDen";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':diemDi', $diemDi, PDO::PARAM_STR);
$stmt->bindParam(':diemDen', $diemDen, PDO::PARAM_STR);
$stmt->execute();
$flights = $stmt->fetchAll();

$sql = "SELECT DDi FROM `chuyenbay`  GROUP BY DDi";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$LocaltionDi = $stmt->fetchAll();
$sql = "SELECT DDen FROM `chuyenbay`  GROUP BY DDen";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$LocaltionDen = $stmt->fetchAll();
// if ($flights) {
//     foreach ($flights as $flight) {
//         echo "Chuyến bay ID: " . $flight['IDChuyenBay'] . " - Giờ khởi hành: " . $flight['GioKhoiHanh'] . " - Giờ đến: " . $flight['GioDen'] . "<br>";
//     }
// } else {
//     echo "Không có chuyến bay phù hợp.";
// }

?>
<section class="banner" id="top">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="left-side">
                    <div class="logo">
                        <img src="img/logo.png" alt="Flight Template">
                    </div>
                    <div class="tabs-content">
                        <h4>Why Fly With Us?</h4>
                        <ul class="social-links">
                            <li><a href=""><em>Best Price Guarantee</em></a></li>
                            <li><a href="#"><em>150+ Worldwide Destinations</em></a></li>
                            <li><a href="#"><em>Premium Customer Service</em></a></li>
                            <li><a href="#"><em>Safe & Flexible Booking</em></a></li>
                        </ul>
                    </div>
                    <div class="page-direction-button">
                        <a href="contact.php"><i class="fa fa-phone"></i>Contact Us Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <section id="first-tab-group" class="tabgroup">
                    <div id="tab1">
                        <div class="submit-form">
                            <h4>Check availability for <em>direction</em>:</h4>
                            <form onsubmit="validateForm(event)" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="from">From:</label>
                                            <select name="from" id="from" required>
                                                <?php
                                                foreach ($LocaltionDi as $value) {
                                                    echo "<option value='{$value['DDi']}'>{$value['DDi']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="to">To:</label>
                                            <select name="to" id="to" required>
                                                <?php
                                                foreach ($LocaltionDen as $value) {
                                                    echo "<option value='{$value['DDen']}'>{$value['DDen']}</option>";
                                                }
                                                ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="departure">Departure date:</label>
                                            <input name="departure" id="departure" type="date" class="form-control" required>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="return">Return date:</label>
                                            <input name="return" id="return" type="date" class="form-control">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="radio-select">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <label for="round">Round</label>
                                                    <input type="radio" name="trip" id="round" value="round" required>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <label for="oneway">Oneway</label>
                                                    <input type="radio" name="trip" id="oneway" value="one-way" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <button type="submit" class="btn">Flight search</button>
                                        </fieldset>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</section>
<?php
include 'footer.php';
?>