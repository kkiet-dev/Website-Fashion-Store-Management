@extends('users.home')
@section('return_policy_content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chính Sách Đổi Hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJb3QusI4U+JAt8DE6kLP1yPfl8zdkx5cY3H9pswb6TYkjtFEfpkdTke/r0a" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5 bg-white p-4 shadow rounded">
        <div class="text-center mb-4">
            <h1 class="text-danger fs-4">CHÍNH SÁCH VÀ ĐIỀU KIỆN ĐỔI HÀNG SẢN PHẨM</h1>
            <p><strong>Thời gian:</strong> Từ 01/08/2024</p>
            <p><strong>Địa điểm:</strong> Toàn bộ hệ thống cửa hàng Shop-KT do công ty trực tiếp quản lý</p>
            <p><strong>Đối tượng:</strong> Áp dụng với khách hàng đã mua hàng tại hệ thống Shop-KT do công ty trực tiếp quản lý</p>
        </div>

        <div class="section mb-4">
            <h2 class="fs-5 border-bottom pb-2">1. CHÍNH SÁCH ĐỔI HÀNG TRONG 30 NGÀY</h2>
            <table class="table table-bordered mt-2">
                <tr>
                    <th>Thời gian đổi hàng</th>
                    <td>30 ngày kể từ thời điểm mua hàng<br>
                        <span class="text-muted">Lưu ý: Siêu thị Aeon Mall áp dụng thời gian đổi hàng trong vòng 5 ngày kể từ ngày mua</span>
                    </td>
                </tr>
                <tr>
                    <th>Số lần áp dụng</th>
                    <td>01 lần</td>
                </tr>
                <tr>
                    <th>Địa điểm đổi hàng</th>
                    <td>Bất kỳ cửa hàng nào của Shop-KT (Trừ đại lý).</td>
                </tr>
            </table>
        </div>

        <div class="section mb-4">
            <h2 class="fs-5 border-bottom pb-2">ĐIỀU KIỆN ĐỔI HÀNG</h2>
            <ul class="ms-4">
                <li>Sản phẩm còn <strong class="text-dark">nguyên tem mác</strong>, chưa qua sử dụng, sửa chữa, không hỏng hóc, thùng, bẩn do tác động từ bên ngoài.</li>
                <li><strong class="text-dark">Không có mùi</strong> nước hoa, nước tẩy rửa hoặc chất lạ.</li>
                <li>Là sản phẩm mang thương hiệu Shop-KT, có hóa đơn mua hàng và có thông tin trên phần mềm bán hàng của Shop-KT.</li>
                <li>Sản phẩm hỗ trợ đổi là sản phẩm <strong class="text-dark">sale &lt; 35%</strong>.</li>
                <li>Sản phẩm đổi size: Đổi miễn phí (Lỗi thông số kỹ thuật).</li>
                <li>Sản phẩm tặng kèm theo chương trình khuyến mãi: <strong class="text-dark">Không áp dụng đổi trả.</strong></li>
                <li>Phụ kiện (tất, sịp): Chỉ đổi khi có <strong class="text-dark">lỗi kỹ thuật.</strong></li>
            </ul>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0P2q0v8F7t6E0KikzJoGGL7uvYo3iq32CgpC6drX1f9tM1Vb" crossorigin="anonymous"></script>
</body>
@endsection
