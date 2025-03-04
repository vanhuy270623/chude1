<?php
var_dump($_POST);
$chuyenbay = $_POST['chuyenbay'];
var_dump($chuyenbay['GioKhoiHanh']);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin đặt vé</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/passenger.css">
</head>

<body class="bg-gray-100 p-4">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
        <div class="container">
            <!-- Left Column -->
            <form action="process_booking.php" method="POST">
                <div class="left-column">
                    <!-- Passenger Information -->

                    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-lg">
                        <div class="container">
                            <div class="left-column">
                                <div class="mb-6">
                                    <h2 class="text-xl font-semibold mb-4 flex items-center">
                                        <i class="fas fa-user mr-2"></i> Thông tin hành khách
                                    </h2>
                                    <p class="text-sm text-gray-600 mb-4">Thông tin của mỗi hành khách phải trùng khớp với giấy tờ tùy thân hợp lệ (CCCD/Passport).</p>

                                    <?php for ($I = 1; $I <= $_POST['passengers']; $I++) { ?>
                                        <div class="border p-4 rounded-lg">
                                            <h3 class="text-md font-semibold mb-2">Người lớn <?= $I ?></h3>
                                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                <div>
                                                    <label class="block text-sm font-medium mb-1">Giới tính</label>
                                                    <select name="passengers[<?= $I ?>][gender]" class="w-full border rounded p-2">
                                                        <option value="Nam">Nam</option>
                                                        <option value="Nữ">Nữ</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium mb-1">Họ tên hành khách *</label>
                                                    <input type="text" name="passengers[<?= $I ?>][fullname]" class="w-full border rounded p-2" required>
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium mb-1">Giấy tờ</label>
                                                    <select name="passengers[<?= $I ?>][document]" class="w-full border rounded p-2">
                                                        <option value="CCCD">CCCD</option>
                                                        <option value="Passport">Passport</option>
                                                    </select>
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium mb-1">Số CCCD / Passport</label>
                                                    <input type="text" name="passengers[<?= $I ?>][id_number]" class="w-full border rounded p-2">
                                                </div>
                                                <div>
                                                    <label class="block text-sm font-medium mb-1">Ngày sinh</label>
                                                    <div class="flex space-x-2">
                                                        <input class="w-1/3 border rounded p-2" name="passengers[<?= $I ?>][dob_day]" placeholder="DD" type="text">
                                                        <input class="w-1/3 border rounded p-2" name="passengers[<?= $I ?>][dob_month]" placeholder="MM" type="text">
                                                        <input class="w-1/3 border rounded p-2" name="passengers[<?= $I ?>][dob_year]" placeholder="YYYY" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-6">
                        <h2 class="text-xl font-semibold mb-4 flex items-center">
                            <i class="fas fa-address-book mr-2"></i> Thông tin liên hệ
                        </h2>
                        <p class="text-sm text-gray-600 mb-4">* Thông tin Hãng yêu cầu (Họ tên, Số di động, Email).</p>
                        <div class="border p-4 rounded-lg">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Giới tính</label>
                                    <select name="contact[gender]" class="w-full border rounded p-2">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Họ tên *</label>
                                    <input type="text" name="contact[fullname]" class="w-full border rounded p-2" placeholder="VÍ DỤ: NGUYEN TUAN ANH" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Số điện thoại *</label>
                                    <input type="text" name="contact[phone]" class="w-full border rounded p-2" required>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Email *</label>
                                    <input type="email" name="contact[email]" class="w-full border rounded p-2" required>
                                </div>
                                <div class="col-span-1 md:col-span-2">
                                    <label class="block text-sm font-medium mb-1">Yêu cầu đặc biệt</label>
                                    <textarea name="contact[special_request]" class="w-full border rounded p-2"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                   



 

                </div>

                <!-- Right Column -->
                <div class="right-column">
                    <!-- Price Details -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold mb-2">Chi tiết giá</h3>
                        <div class="border-t border-b py-2">
                            <div class="flex justify-between text-sm mb-2">
                                <?php $chuyenbay=$_POST['chuyenbay'] ?>
                                <span>Số vé</span>
                                <span><?= "x" . $_POST['passengers'] ?></span>
                                <span><?= number_format($_POST['TongTien']) ?></span>
                                <input type="hidden" name="Tienve[sove]" value="<?= $_POST['passengers'] ?>">
                                <input type="hidden" name="Tienve[TongTien]" value="<?= $_POST['TongTien'] ?>">
                                <input type="hidden" name="Tienve[GioKhoiHanh]" value="<?= $chuyenbay['GioKhoiHanh'] ?>">
                                <input type="hidden" name="Tienve[GioDen]" value="<?=$chuyenbay['GioDen'] ?>">
                                <input type="hidden" name="Tienve[ThoiGianDuKien]" value="<?= $chuyenbay['ThoiGianDuKien'] ?>">
                                <input type="hidden" name="Tienve[DDi]" value="<?= $chuyenbay['DDi'] ?>">
                                <input type="hidden" name="Tienve[DDen]" value="<?= $chuyenbay['DDen'] ?>">
                                <input type="hidden" name="Tienve[IDHang]" value="<?= $chuyenbay['IDHang'] ?>">
                                <input type="hidden" name="Tienve[NgayBay]" value="<?= $chuyenbay['NgayBay'] ?>">
                            </div>
                            
                            <div class="flex justify-between text-sm mb-2">
                                <span>Giảm giá</span>
                                <span>0</span>
                            </div>
                            <div class="flex justify-between text-sm font-semibold">
                                <span>Tổng</span>
                                <span><?= number_format($_POST['TongTien']) ?></span>
                            </div>
                        </div>
                        <div class="text-right text-lg font-semibold text-blue-600 mt-2"><?= number_format($_POST['TongTien']) ?></div>
                        <div class="text-right text-sm text-gray-600">Đã bao gồm thuế, phí.</div>
                    </div>

                    <!-- Flight Details -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2"><?= $chuyenbay['DDi'] ?> → <?= $chuyenbay['DDen'] ?></h3>
                        <p class="text-sm text-gray-600 mb-2">Ngày <?= date("d/m/Y", strtotime($chuyenbay['NgayBay'])) ?> — <?= $_POST['passengers'] ?> khách</p>
                        <div class="border-t border-b py-2">
                            <div class="flex items-center mb-2">
                                <span class="text-sm font-semibold"><?= date("H:i", strtotime($chuyenbay['GioKhoiHanh'])) ?></span>
                                <span class="mx-2">→</span>
                                <span class="text-sm font-semibold"><?= date("H:i", strtotime($chuyenbay['GioDen'])) ?></span>
                            </div>
                            <div class="flex items-center mb-2">
                            </div>
                            <div class="text-sm text-gray-600"> Thời gian dự kiến: <?= date("H:i", strtotime($chuyenbay['ThoiGianDuKien'])) ?></div>
                        </div>
                        <div class="center-button">
                        <button type="submit" class="bg-yellow-500 text-white font-semibold py-2 px-6 rounded-lg">Tiếp tục</button>
                    </div>
                    </div>
                </div>
        </div>
        </form>

        <!-- Continue Button -->

    </div>
    <script src="js/main.js"></script>
</body>

</html>