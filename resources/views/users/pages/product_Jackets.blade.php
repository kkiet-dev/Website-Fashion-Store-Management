@extends('users.home')
@section('product_jackets_content')
<head>
    <style> .portfolio-box img { transition: transform 0.3s ease, brightness 0.3s ease; } .portfolio-box:hover img { transform: scale(1.02); filter: brightness(0.8); } </style>
</head>

<section class="page-section" id="services">
    <div class="container px-4 px-lg-5" style="padding-top: 86px">
        @php
            $displayedCategories = []; // Mảng để kiểm tra danh mục đã hiển thị
        @endphp

        @foreach($products as $product)
            @if(!in_array($product->category->name, $displayedCategories)) 
                <!-- Kiểm tra nếu danh mục chưa được hiển thị -->
                <h2 class="text-center mt-0">{{ $product->category->name }}</h2>
                @php
                    $displayedCategories[] = $product->category->name; // Thêm danh mục vào mảng đã hiển thị
                @endphp
            @endif
        @endforeach

        <hr class="divider" />
    </div>
</section>

<div id="portfolio">
    <div class="container-fluid p-0">
        <div class="row g-0">
            @foreach($products as $product)
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" onclick="redirectToDetail({{ $product->id }})" title="Project Name">
                        <img class="img-fluid" src="{{ Storage::url('products/' . $product->image) }}" alt="..." />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">{{ $product->category->name }}</div>
                            <div class="project-name d-flex justify-content-center">{{ $product->name }}</div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    function redirectToDetail(productId) {
        // Chuyển hướng đến trang chi tiết sản phẩm với ID
        window.location.href = `/product_detail/${productId}`;
    }
</script>


@endsection