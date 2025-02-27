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
    function redirectToPassenger() {
        window.location.href = "passengerif.php";
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
                <div class="flight-info">
                    <img alt="Vietnam Airlines logo"
                        src="https://storage.googleapis.com/a1aa/image/qge95MvO5Ry41s9syle6fkIbelOD6pIAQm_LX8kHKRw.jpg" />
                    <div class="details">
                        <div class="font-bold">Vietnam Airlines - VN7214</div>
                        <div class="text-sm text-gray-500">22:15 SGN <i class="fas fa-arrow-right mx-2"></i> 00:20 HAN
                        </div>
                        <div class="text-sm text-gray-500">2h 5m Bay thẳng</div>
                    </div>
                    <div class="price">
                        <div class="text-lg font-bold text-blue-600">2.020.000</div>
                        <div class="text-sm text-gray-500">Tổng thành tiền</div>
                        <button onclick="redirectToPassenger()">CHỌN</button>
                    </div>
                </div>
                <div class="flight-info">
                    <img alt="Vietnam Airlines logo"
                        src="https://storage.googleapis.com/a1aa/image/qge95MvO5Ry41s9syle6fkIbelOD6pIAQm_LX8kHKRw.jpg" />
                    <div class="details">
                        <div class="font-bold">Vietnam Airlines - VN7212</div>
                        <div class="text-sm text-gray-500">23:10 SGN <i class="fas fa-arrow-right mx-2"></i> 01:15 HAN
                        </div>
                        <div class="text-sm text-gray-500">2h 5m Bay thẳng</div>
                    </div>
                    <div class="price">
                        <div class="text-lg font-bold text-blue-600">2.020.000</div>
                        <div class="text-sm text-gray-500">Tổng thành tiền</div>
                        <button onclick="redirectToPassenger()">CHỌN</button>
                    </div>
                </div>

                <div class="flight-info">
                    <img alt="Vietnam Airlines logo"
                        src="https://storage.googleapis.com/a1aa/image/qge95MvO5Ry41s9syle6fkIbelOD6pIAQm_LX8kHKRw.jpg" />
                    <div class="details">
                        <div class="font-bold">Vietnam Airlines - VN7208</div>
                        <div class="text-sm text-gray-500">05:30 SGN <i class="fas fa-arrow-right mx-2"></i> 07:35 HAN
                        </div>
                        <div class="text-sm text-gray-500">2h 5m Bay thẳng</div>
                    </div>
                    <div class="price">
                        <div class="text-lg font-bold text-blue-600">2.050.000</div>
                        <div class="text-sm text-gray-500">Tổng thành tiền</div>
                        <button onclick="redirectToPassenger()">CHỌN</button>
                    </div>
                </div>

                <div class="flight-info">
                    <img alt="Vietnam Airlines logo"
                        src="https://storage.googleapis.com/a1aa/image/qge95MvO5Ry41s9syle6fkIbelOD6pIAQm_LX8kHKRw.jpg" />
                    <div class="details">
                        <div class="font-bold">Vietnam Airlines - VN7210</div>
                        <div class="text-sm text-gray-500">05:30 SGN <i class="fas fa-arrow-right mx-2"></i> 07:35 HAN
                        </div>
                        <div class="text-sm text-gray-500">2h 5m Bay thẳng</div>
                    </div>
                    <div class="price">
                        <div class="text-lg font-bold text-blue-600">2.050.000</div>
                        <div class="text-sm text-gray-500">Tổng thành tiền</div>
                        <button onclick="redirectToPassenger()">CHỌN</button>
                    </div>
                </div>

                <div class="flight-info">
                    <img alt="Vietnam Airlines logo"
                        src="https://storage.googleapis.com/a1aa/image/qge95MvO5Ry41s9syle6fkIbelOD6pIAQm_LX8kHKRw.jpg" />
                    <div class="details">
                        <div class="font-bold">Vietnam Airlines - VN206</div>
                        <div class="text-sm text-gray-500">06:00 SGN <i class="fas fa-arrow-right mx-2"></i> 08:05 HAN
                        </div>
                        <div class="text-sm text-gray-500">2h 5m Bay thẳng</div>
                    </div>
                    <div class="price">
                        <div class="text-lg font-bold text-blue-600">2.381.000</div>
                        <div class="text-sm text-gray-500">Tổng thành tiền</div>
                        <button onclick="redirectToPassenger()">CHỌN</button>
                    </div>
                </div>

                <div class="flight-info">
                    <img alt="Vietnam Airlines logo"
                        src="https://storage.googleapis.com/a1aa/image/qge95MvO5Ry41s9syle6fkIbelOD6pIAQm_LX8kHKRw.jpg" />
                    <div class="details">
                        <div class="font-bold">Vietnam Airlines - VN252</div>
                        <div class="text-sm text-gray-500">16:40 SGN <i class="fas fa-arrow-right mx-2"></i> 18:45 HAN
                        </div>
                        <div class="text-sm text-gray-500">2h 5m Bay thẳng</div>
                    </div>
                    <div class="price">
                        <div class="text-lg font-bold text-blue-600">2.848.000</div>
                        <div class="text-sm text-gray-500">Tổng thành tiền</div>
                        <button onclick="redirectToPassenger()">CHỌN</button>
                    </div>
                </div>

                <div class="flight-info">
                    <img alt="Vietnam Airlines logo"
                        src="https://storage.googleapis.com/a1aa/image/qge95MvO5Ry41s9syle6fkIbelOD6pIAQm_LX8kHKRw.jpg" />
                    <div class="details">
                        <div class="font-bold">Vietnam Airlines - VN260</div>
                        <div class="text-sm text-gray-500">21:00 SGN <i class="fas fa-arrow-right mx-2"></i> 23:05 HAN
                        </div>
                        <div class="text-sm text-gray-500">2h 5m Bay thẳng</div>
                    </div>
                    <div class="price">
                        <div class="text-lg font-bold text-blue-600">2.848.000</div>
                        <div class="text-sm text-gray-500">Tổng thành tiền</div>
                        <button onclick="redirectToPassenger()">CHỌN</button>
                    </div>
                </div>

                <div class="flight-info">
                    <img alt="Vietnam Airlines logo"
                        src="https://storage.googleapis.com/a1aa/image/qge95MvO5Ry41s9syle6fkIbelOD6pIAQm_LX8kHKRw.jpg" />
                    <div class="details">
                        <div class="font-bold">Vietnam Airlines - VN224</div>
                        <div class="text-sm text-gray-500">22:00 SGN <i class="fas fa-arrow-right mx-2"></i> 00:05 HAN
                        </div>
                        <div class="text-sm text-gray-500">2h 5m Bay thẳng</div>
                    </div>
                    <div class="price">
                        <div class="text-lg font-bold text-blue-600">2.848.000</div>
                        <div class="text-sm text-gray-500">Tổng thành tiền</div>
                        <button onclick="redirectToPassenger()">CHỌN</button>
                    </div>
                </div>
                <div class="flight-info">
                    <img alt="Vietjet Air logo"
                        src="https://storage.googleapis.com/a1aa/image/Oq1tCQqOOQr42yWO3DYuRyfepECFjP0k4EmmrpDGrPI.jpg" />
                    <div class="details">
                        <div class="font-bold">Vietjet Air - VJ184</div>
                        <div class="text-sm text-gray-500">12:40 SGN <i class="fas fa-arrow-right mx-2"></i> 14:50 HAN
                        </div>
                        <div class="text-sm text-gray-500">2h 10m Bay thẳng</div>
                    </div>
                    <div class="price">
                        <div class="text-lg font-bold text-blue-600">2.852.000</div>
                        <div class="text-sm text-gray-500">Tổng thành tiền</div>
                        <button onclick="redirectToPassenger()">CHỌN</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>