@extends('users.home')

@section('transport_content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop-KT Shipping</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJb3QusI4U+JAt8DE6kLP1yPfl8zdkx5cY3H9pswb6TYkjtFEfpkdTke/r0a" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="kt-container mt-5 bg-white p-4 shadow rounded">
        <div class="kt-header d-flex align-items-center mb-4">
            <img src="{{asset('assets/img/icons/shop.png')}}" alt="" class="kt-small-icon me-3" style="width: 80px;">
            <h1 class="kt-title text-danger fs-4 m-0">Shop-KT GIAO HÀNG TOÀN QUỐC</h1>
        </div>
        <p class="kt-info">Tới tất cả <strong>63 tỉnh thành</strong> trên phạm vi lãnh thổ Việt Nam</p>

        <table class="kt-table table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">ĐƠN HÀNG</th>
                    <th scope="col">PHÍ GIAO HÀNG</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Dưới 300.000đ</td>
                    <td>19.000đ</td>
                </tr>
                <tr>
                    <td>Từ 300.000đ trở lên</td>
                    <td class="kt-freeship text-danger fw-bold">FREESHIP (Miễn phí)</td>
                </tr>
            </tbody>
        </table>

        <div class="bg-warning mt-4">
            <strong>LƯU Ý:</strong>
            <ul class="kt-note ms-4">
                <li>Nhân viên bán hàng Shop-KT sẽ tư vấn và hẹn thời gian giao hàng, hướng dẫn các hình thức thanh toán cho khách hàng đầy đủ và chi tiết (chuyển khoản hoặc nhận hàng thu tiền tại chỗ COD).</li>
                <li>Trong trường hợp đổi sản phẩm, khách hàng vui lòng thanh toán chi phí vận chuyển. Nhân viên Shop-KT sẽ hỗ trợ hướng dẫn cho quý khách hàng.</li>
            </ul>
        </div>

        <div class="kt-footer text-center mt-4">
            <p class="text-muted">&copy; 2024 Shop-KT. All rights reserved.</p>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0P2q0v8F7t6E0KikzJoGGL7uvYo3iq32CgpC6drX1f9tM1Vb" crossorigin="anonymous"></script>
</body>
@endsection
