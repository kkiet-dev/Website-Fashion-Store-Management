@extends('users.home')
@section('product_detail_content')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        .product-detail {
            max-width: 1200px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .product-image img {
            width: 100%;
            height: auto;
            border-radius: 8px;
        }
        .product-info {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .product-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #dc3545;
        }
        .btn-order {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .btn-order:hover {
            background-color: #0056b3;
        }
        @media (max-width: 768px) {
            .product-detail {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="product-detail container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <!-- Hình ảnh sản phẩm -->
            <div class="col-md-6 product-image">
                <img src="{{ $products->image ? Storage::url('products/' . $products->image) : 'https://via.placeholder.com/500' }}" alt="{{ $products->name }}" class="img-fluid">
            </div>
    
            <!-- Thông tin sản phẩm -->
            <div class="col-md-6 product-info">
                <h2 class="product-title">{{$products->name}}</h2>
                <p class="product-price">{{$products->price}}</p>
                <p class="product-description">
                    {{$products->description}}Đây là mô tả chi tiết của sản phẩm. Sản phẩm được làm từ chất liệu cao cấp, thiết kế tinh tế, phù hợp với mọi đối tượng.
                </p>
                
                    <form action="{{ route('cart.add', $products->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success ms-3" style="width: 24%">Add to cart</button>
                    </form>
            </div>
        </div>
    </div>
    @include('users.coments.coments')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection