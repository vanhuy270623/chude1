<?php
include 'header.php';
$jsonFile = 'api/airport_data.json';
$jsonData = file_get_contents($jsonFile);
$airportData = json_decode($jsonData, true);
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
                        <h4>Tại Sao Nên Bay Cùng Chúng Tôi?</h4>
                        <ul class="social-links">
                            <li><a href=""><em>Cam kết giá tốt nhất</em></a></li>
                            <li><a href="#"><em>Hơn 150 điểm đến trên toàn thế giới</em></a></li>
                            <li><a href="#"><em>Dịch vụ khách hàng cao cấp</em></a></li>
                            <li><a href="#"><em>Đặt chỗ an toàn & linh hoạt</em></a></li>
                        </ul>
                    </div>
                    <div class="page-direction-button">
                        <a href="contact.php"><i class="fa fa-phone"></i>Liên hệ ngay</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-md-offset-1">
                <section id="first-tab-group" class="tabgroup">
                    <div id="tab1">
                        <div class="submit-form">
                            <h4>Kiểm tra chỗ trống cho <em>hướng</em>:</h4>
                            <form onsubmit="validateForm(event)" action="api/api.php" method="get">
                                <!-- <input type="hidden" name="action" value="timkiem"> -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="from">Từ:</label>
                                            <select name="DDi" id="DDi" required>
                                                <?php
                                                foreach ($airportData as $key => $value) {
                                                    echo "<option value='{$key}'>{$value}</option>";
                                                }
                                                ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="to">Đến:</label>
                                            <select name="DDen" id="DDen" required>
                                                <?php
                                                foreach ($airportData as $key => $value) {
                                                    echo "<option value='{$key}'>{$value}</option>";
                                                }
                                                ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="departure">Ngày khởi hành:</label>
                                            <input name="NgayBay" id="NgayBay" type="date" class="form-control" required>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="NgayBayReturn">Ngày trở về:</label>
                                            <input name="NgayBayReturn" id="NgayBayReturn" type="date" class="form-control">
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="passengers">Số lượng hành khách:</label>
                                            <input name="passengers" type="number" class="form-control" min="1" max="10" required>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <button type="submit" class="btn">Tìm chuyến bay</button>
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