<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OpenStreetMap Integration</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>
        #map {
            height: 400px;
            width: 100%;
            margin-bottom: 10px;
        }
        #suggestions {
            list-style: none;
            padding: 0;
            border: 1px solid #ccc;
            max-height: 150px;
            overflow-y: auto;
        }
        #suggestions li {
            padding: 5px;
            cursor: pointer;
        }
        #suggestions li:hover {
            background-color: #f0f0f0;
        }
        .form-container {
            margin-top: 20px;
        }
        .pointer-red {
            cursor: url('https://upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Red_Cross_Cursor_Icon.svg/50px-Red_Cross_Cursor_Icon.svg.png'), auto;
        }
    </style>
</head>
<body>
    <h1>Chọn địa chỉ nhận hàng</h1>

  

    <div class="form-container">
        <form action="/submit-order" method="POST">
            @csrf
            <label for="address">Địa chỉ nhận hàng:</label>
            <input type="text" id="address" name="address" placeholder="Địa chỉ đã chọn">
            {{--   --}}
            <button type="submit">Xác nhận</button>
        </form>
        
        <!-- Nút để bật chế độ chọn thủ công -->
        <button id="manual-location-btn">Chọn vị trí thủ công</button>

        <div id="map"></div>
        
    </div>

    <script>
    /// Bản đồ và marker mặc định
        const defaultLocation = [10.762622, 106.660172]; // TP. HCM

        // Khởi tạo bản đồ
        const map = L.map('map').setView(defaultLocation, 13);

        // Thêm tile layer OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Thêm marker mặc định
        const marker = L.marker(defaultLocation).addTo(map)
            .bindPopup('Vị trí mặc định: TP. HCM')
            .openPopup();

        // Khi nhấn nút "Chọn vị trí thủ công"
        document.getElementById('manual-location-btn').addEventListener('click', function () {
            // Bật chế độ chọn vị trí thủ công, thay đổi con trỏ chuột thành màu đỏ
            document.body.classList.add('pointer-red');
            
            map.on('dblclick', function (e) {
                const lat = e.latlng.lat;
                const lon = e.latlng.lng;

                // Cập nhật marker với vị trí người dùng chọn
                marker.setLatLng([lat, lon]).bindPopup('Vị trí đã chọn').openPopup();

                // Gửi yêu cầu reverse geocoding đến Nominatim API
                fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lon}&addressdetails=1`)
                    .then(response => response.json())
                    .then(data => {
                        // Lấy địa chỉ từ kết quả trả về
                        const address = data.display_name;

                        // Cập nhật địa chỉ vào trường input với id="address"
                        document.getElementById('address').value = address;
                    })
                    .catch(error => {
                        console.error("Lỗi khi lấy địa chỉ:", error);
                    });

                // Sau khi chọn vị trí, quay lại con trỏ chuột bình thường
                document.body.classList.remove('pointer-red');
            });
        });


    </script>
</body>
</html>
