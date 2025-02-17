
@extends('admin.home')
@section('oder_detail_content')
<head>
    <style> 
        .small-text { font-size: 14px; } 
    </style>
    @php
       $tempAddress = session('temp_address');
    @endphp

</head>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="breadcrumbs">
                <div class="breadcrumbs-inner">
                    <div class="row m-0 pt-5">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h3>Chi tiết đơn hàng: #{{ $shipping->id }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-header"> 
                                        <p class="small-text"><strong>Tên người mua:</strong> {{ $shipping->user->name ?? 'Không xác định' }}</p>
                                        <p class="small-text"><strong>Gmail:</strong> {{ $shipping->user->email ?? 'Không xác định' }}</p> 
                                        <p class="small-text"><strong>Số điện thoại:</strong> {{ $shipping->user->phone ?? 'Không xác định' }}</p> 
                                        <p class="small-text"> <strong>Địa chỉ:</strong> 
                                            @if($shipping->shipping_address) 
                                                {{ $shipping->shipping_address }} 
                                            @elseif(isset($tempAddress) && $tempAddress)
                                                {{ $tempAddress }} 
                                            @else 
                                                <span class="text-danger">Địa chỉ không có sẵn. Vui lòng cập nhật địa chỉ của bạn.</span> 
                                            @endif 
                                        </p>
                                        <p class="small-text"><strong>Tổng giá:</strong> {{ $shipping->price ?? 'Không xác định' }}</p> 
                                        <p class="small-text"><strong>Ngày tạo:</strong> {{ $shipping->created_at->format('d/m/Y') ?? 'Không xác định' }}</p>
                                        {{-- <p class="small-text"><strong>Trạng thái:</strong>
                                        @if( $pendingOrder->status)
                                        {{
                                             $pendingOrder->status
                                        }}
                                        @elseif($deliveredOrder->status)
                                        {{
                                            $deliveredOrder->status
                                        }}
                                        @endif
                                        </p> --}}
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>Ảnh</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Tổng</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $shipping->product->name ?? 'Không xác định' }}</td>
                                                <td>
                                                    @if ($shipping->product && $shipping->product->image)
                                                        <img src="{{ Storage::url('products/' . $shipping->product->image) }}" class="img-fluid" width="64px">
                                                    @else
                                                        <p>Không có ảnh</p>
                                                    @endif
                                                </td>
                                                <td>{{ number_format($shipping->product->price, 0, ',', '.') }} đ</td>
                                                <td>{{ $shipping->quantity }}</td>
                                                <td>{{ number_format($shipping->product->price * $shipping->quantity, 0, ',', '.') }} đ</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <form method="POST" action="{{ route('oder.delete', $shipping->id) }}" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger text-secondary font-weight-bold text-xs">delete</button>
                                                    </form>
                                                <td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
