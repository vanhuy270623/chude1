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
            <div class="left-column">
                <!-- Passenger Information -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-4 flex items-center">
                        <i class="fas fa-user mr-2"></i> Thông tin hành khách
                    </h2>
                    <p class="text-sm text-gray-600 mb-4">Thông tin của mỗi hành khách phải trùng khớp với giấy tờ tùy
                        thân hợp lệ (CCCD/Passport).</p>
                    <div class="border p-4 rounded-lg">
                        <h3 class="text-md font-semibold mb-2">Người lớn 1</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Giới tính</label>
                                <select class="w-full border rounded p-2">
                                    <option>Nam</option>
                                    <option>Nữ</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Họ tên hành khách *</label>
                                <input type="text" class="w-full border rounded p-2"
                                    placeholder="VÍ DỤ: NGUYEN TUAN ANH">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Giấy tờ</label>
                                <select class="w-full border rounded p-2">
                                    <option>CCCD</option>
                                    <option>Passport</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Số CCCD / Passport</label>
                                <input type="text" class="w-full border rounded p-2">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Ngày sinh</label>
                                <div class="flex space-x-2">
                                    <input class="w-1/3 border rounded p-2" placeholder="DD" type="text">
                                    <input class="w-1/3 border rounded p-2" placeholder="MM" type="text">
                                    <input class="w-1/3 border rounded p-2" placeholder="YYYY" type="text">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h3 class="text-md font-semibold mb-2">Hành lý</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium mb-1">Xách tay</label>
                                    <input class="w-full border rounded p-2" disabled type="text"
                                        value="Mỗi hành khách tối đa 7kg">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-1">Ký gửi</label>
                                    <select class="w-full border rounded p-2">
                                        <option>Không mang hành lý ký gửi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="mb-6">
                    <h2 class="text-xl font-semibold mb-4 flex items-center">
                        <i class="fas fa-address-book mr-2"></i> Thông tin liên hệ
                    </h2>
                    <p class="text-sm text-gray-600 mb-4">* Thông tin Hãng yêu cầu (Họ tên, Số di động, Email).</p>
                    <div class="border p-4 rounded-lg">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium mb-1">Giới tính</label>
                                <select class="w-full border rounded p-2">
                                    <option>Nam</option>
                                    <option>Nữ</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Họ tên *</label>
                                <input type="text" class="w-full border rounded p-2"
                                    placeholder="VÍ DỤ: NGUYEN TUAN ANH">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Số điện thoại *</label>
                                <input type="text" class="w-full border rounded p-2">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-1">Email *</label>
                                <input type="email" class="w-full border rounded p-2">
                            </div>
                            <div class="col-span-1 md:col-span-2">
                                <label class="block text-sm font-medium mb-1">Yêu cầu đặc biệt</label>
                                <textarea class="w-full border rounded p-2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Invoice Information -->
                <div class="mb-6 cursor-pointer" onclick="toggleInvoiceInfo()">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-file-invoice mr-2"></i>
                        <h2 class="text-lg font-semibold">Thông tin xuất hóa đơn</h2>
                        <!-- Thêm biểu tượng mũi tên -->
                        <i id="arrow-icon" class="fas fa-chevron-down ml-2 transition-transform duration-200"></i>
                    </div>
                </div>

                <div id="invoice-info" class="hidden">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-file-alt text-xl mr-2"></i>
                        <h2 class="text-lg font-semibold">Thông tin xuất hóa đơn</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="ten-khach-hang" class="block text-sm font-medium text-gray-700">Tên khách
                                hàng</label>
                            <input type="text" id="ten-khach-hang"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" id="email"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="ten-cong-ty" class="block text-sm font-medium text-gray-700">Tên công ty</label>
                            <input type="text" id="ten-cong-ty"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div>
                            <label for="ma-so-thue" class="block text-sm font-medium text-gray-700">Mã số thuế</label>
                            <input type="text" id="ma-so-thue"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                        <div class="md:col-span-2">
                            <label for="dia-chi" class="block text-sm font-medium text-gray-700">Địa chỉ</label>
                            <input type="text" id="dia-chi"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
                            <span>Người lớn</span>
                            <span>x 1</span>
                            <span>1.794.200</span>
                        </div>
                        <div class="flex justify-between text-sm mb-2">
                            <span>Hành lý thêm</span>
                            <span>0</span>
                        </div>
                        <div class="flex justify-between text-sm mb-2">
                            <span>Giảm giá</span>
                            <span>0</span>
                        </div>
                        <div class="flex justify-between text-sm font-semibold">
                            <span>Tổng</span>
                            <span>1.794.200</span>
                        </div>
                    </div>
                    <div class="text-right text-lg font-semibold text-blue-600 mt-2">1.794.200</div>
                    <div class="text-right text-sm text-gray-600">Đã bao gồm thuế, phí.</div>
                </div>

                <!-- Flight Details -->
                <div>
                    <h3 class="text-lg font-semibold mb-2">Hồ Chí Minh (SGN) → Hà Nội (HAN)</h3>
                    <p class="text-sm text-gray-600 mb-2">Ngày 02/03/2025 — 1 khách</p>
                    <div class="border-t border-b py-2">
                        <div class="flex items-center mb-2">
                            <span class="text-sm font-semibold">05:20</span>
                            <span class="mx-2">→</span>
                            <span class="text-sm font-semibold">07:30</span>
                        </div>
                        <div class="text-sm text-gray-600 mb-2">Hồ Chí Minh (SGN) — Quốc tế Tân Sơn Nhất</div>
                        <div class="text-sm text-gray-600 mb-2">Hà Nội (HAN) — Quốc tế Nội Bài</div>
                        <div class="flex items-center mb-2">
                            <img alt="Vietjet Air logo" class="mr-2" height="20"
                                src="https://storage.googleapis.com/a1aa/image/R2CidQyv-GbXolKmfEYRz57aMKKwsPFVs_SL9BtNj-k.jpg"
                                width="20">
                            <span class="text-sm font-semibold">Vietjet Air</span>
                            <span class="ml-2 text-sm">VJ198 - Eco W1</span>
                        </div>
                        <div class="text-sm text-gray-600">2h 10m</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Continue Button -->
        <div class="center-button">
            <button class="bg-yellow-500 text-white font-semibold py-2 px-6 rounded-lg">Tiếp tục</button>
        </div>
    </div>
    <script src="js/main.js"></script>
</body>

</html>