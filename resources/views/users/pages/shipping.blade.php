@extends('users.home')
@section('shipping_content')

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets_users/css/shipping.css') }}">
</head>

<div class="container-fluid my-5 d-flex justify-content-center" style="padding-top: 64px;">
    <div class="card card-1">
        <div class="card-header bg-white">
            <h4 class="mb-0">Trạng thái đơn hàng</h4>
            @if (session('shipsuccess'))
                <div class="alert alert-success">
                    {{ session('shipsuccess') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div> 

        <div class="card-body">
            {{-- Hiển thị đơn hàng ở trạng thái "pending" --}}
            <h5>Đơn hàng đang chờ vận chuyển:</h5>
            @php
                $totalPendingAmount = 0;
            @endphp
            @forelse ($shipping->where('status', 'pending') as $pendingOrder)
                @php
                    $totalPendingAmount += $pendingOrder->product->price * $pendingOrder->quantity;
                @endphp
                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <img class="img-fluid mr-3" 
                                         src="{{ Storage::url('products/' . $pendingOrder->product->image) }}" 
                                         width="100" height="100">
                                    <div class="media-body">
                                        <h6 class="mb-1">{{ $pendingOrder->product->name }}</h6>
                                        <p class="mb-1">Số lượng: {{ $pendingOrder->quantity }}</p>
                                        <p class="mb-1">Giá: {{ number_format($pendingOrder->product->price, 0, ',', '.') }} đ</p>
                                        <p class="mb-0"><strong>Trạng thái:</strong> {{ $pendingOrder->status }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>Không có đơn hàng nào đang chờ vận chuyển.</p>
            @endforelse

            @if ($shipping->where('status', 'pending')->isNotEmpty())
                <div class="row mt-3">
                    <div class="col text-right">
                        <h5><strong>Tổng giá trị đơn hàng:</strong> {{ number_format($totalPendingAmount, 0, ',', '.') }} đ</h5>
                    </div>
                </div>
            @endif

            <hr>
            {{-- Hiển thị đơn hàng đã giao --}}
            <h5>Đơn hàng đã giao:</h5>
            @forelse ($shipping->where('status', 'delivered') as $deliveredOrder)
                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="media">
                                    <img class="img-fluid mr-3" 
                                         src="{{ Storage::url('products/' . $deliveredOrder->product->image) }}" 
                                         width="100" height="100">
                                    <div class="media-body">
                                        <h6 class="mb-1">{{ $deliveredOrder->product->name }}</h6>
                                        <p class="mb-1">Số lượng: {{ $deliveredOrder->quantity }}</p>
                                        <p class="mb-1">Giá: {{ number_format($deliveredOrder->product->price, 0, ',', '.') }} đ</p>
                                        <p class="mb-0"><strong>Trạng thái:</strong> {{ $deliveredOrder->status }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>Không có đơn hàng nào đã giao.</p>
            @endforelse
        </div>
    </div>
</div>

@endsection
