<?php 
include 'header.php';
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
                            <form id="form-submit" action="search.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="from">From:</label>
                                            <select name='from' required>
                                                <option value="">Select a location...</option>
                                                <option value="Ho Chi Minh City">Ho Chi Minh City</option>
                                                <option value="Hanoi">Hanoi</option>
                                                <option value="Da Nang">Da Nang</option>
                                                <option value="Nha Trang">Nha Trang</option>
                                                <option value="Phu Quoc">Phu Quoc</option>
                                                <option value="Can Tho">Can Tho</option>
                                                <option value="Hue">Hue</option>
                                                <option value="Vinh">Vinh</option>
                                                <option value="Thanh Hoa">Thanh Hoa</option>
                                                <option value="Quang Ninh">Quang Ninh</option>
                                                <option value="Buon Ma Thuot">Buon Ma Thuot</option>
                                                <option value="Da Lat">Da Lat</option>
                                                <option value="Con Dao">Con Dao</option>
                                                <option value="Tuy Hoa">Tuy Hoa</option>
                                                <option value="Quy Nhon">Quy Nhon</option>
                                                <option value="Rach Gia">Rach Gia</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="to">To:</label>
                                            <select name='to' required>
                                                <option value="Ho Chi Minh City">Ho Chi Minh City</option>
                                                <option value="Hanoi">Hanoi</option>
                                                <option value="Da Nang">Da Nang</option>
                                                <option value="Nha Trang">Nha Trang</option>
                                                <option value="Phu Quoc">Phu Quoc</option>
                                                <option value="Can Tho">Can Tho</option>
                                                <option value="Hue">Hue</option>
                                                <option value="Vinh">Vinh</option>
                                                <option value="Thanh Hoa">Thanh Hoa</option>
                                                <option value="Quang Ninh">Quang Ninh</option>
                                                <option value="Buon Ma Thuot">Buon Ma Thuot</option>
                                                <option value="Da Lat">Da Lat</option>
                                                <option value="Con Dao">Con Dao</option>
                                                <option value="Tuy Hoa">Tuy Hoa</option>
                                                <option value="Quy Nhon">Quy Nhon</option>
                                                <option value="Rach Gia">Rach Gia</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="departure">Departure date:</label>
                                            <input name="departure" type="date" class="form-control" required>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                            <label for="return">Return date:</label>
                                            <input name="return" type="date" class="form-control" required>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="radio-select">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <label for="round">Round</label>
                                                    <input type="radio" name="trip" id="round" value="round"
                                                        required="required" onchange='this.form.()'>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-6">
                                                    <label for="oneway">Oneway</label>
                                                    <input type="radio" name="trip" id="oneway" value="one-way"
                                                        required="required" onchange='this.form.()'>
                                                </div>
                                            </div>
                                        </div>
                                    </div><div class="col-md-6">
                                        <fieldset>
                                            <label for="passengers">Number of passengers:</label>
                                            <input name="passengers" type="number" class="form-control" min="1" max="10"
                                                required>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-6">
                                        <fieldset>
                                        <button type="button" class="btn" onclick="window.location.href='flightsearch.php';">Flight search</button>
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
