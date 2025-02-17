@extends('users.home')
@section('payment_infor_content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            padding-top: 64px;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 85vh;">
        <div class="card shadow-sm p-4" style="max-width: 400px; width: 100%;">
            <h3 class="card-title text-center mb-4">Thông Tin Thanh Toán</h3>
            <p><strong>Tên Shop:</strong>SHOP KT</p>
            <p><strong>Ngân Hàng:</strong> Viettinbank</p>
            <p><strong>Số Tài Khoản:</strong> 1234 5678 9012</p>

            <div class="qr-code-container text-center mt-4 p-3 border rounded-3" style="background-color: #fafafa;">
                <p><strong>Mã QR:</strong></p>
                <!-- Thay thế đường dẫn dưới đây bằng mã QR của bạn -->
                <img src="{{asset('assets/img/qr.jpg')}}" alt="QR Code" class="img-fluid">
            </div>
            
        </div>
       
    </div>
    <div class="container d-flex justify-content-center align-items-center" style="height: 25vh;">
        <div class="spinner"></div>
    </div>
    <div class="container d-flex justify-content-center align-items-center">
            <p>Đang trong quá trình hoàn thiện.!</p>
    </div>
   

    <!-- Thêm link đến Bootstrap JS (nếu cần cho các tính năng JS) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>


<style>
    .spinner {
    border: 4px solid rgba(0, 0, 0, 0.1);
    border-left-color: transparent;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    }

    @keyframes spin {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
    }
</style>

@endsection
