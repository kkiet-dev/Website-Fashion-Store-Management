@extends('users.home')
@section('cart_content')
<head>

  @php
      $tempAddress = session('temp_address');
      $tempPhone = session('temp_phone');
      $createdAt = session('temp_address_created_at');
      $timeoutMinutes = 1; 
      $isExpired = $createdAt && now()->diffInMinutes($createdAt) >= $timeoutMinutes;
  @endphp

</head>
<section class="h-100 overflow-auto h-custom pt-4" style="background-color: #d2c9ff; height: 85vh;">
  <div class="container py-5 h-100 pb-4">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12">
        <div class="card card-registration card-registration-2" style="border-radius: 15px;">
          <div class="card-body p-0">
            <div class="row g-0">
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="d-flex justify-content-between align-items-center mb-5">
                    <h4 class="fw-bold mb-0">Shopping Cart</h4>
                  </div>
                  <hr class="my-4">

                  <div class="row mb-4 d-flex justify-content-between align-items-center">
                    @if(auth()->check() && $order && $order->items->count() > 0)
                        @foreach ($order->items as $item)
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                @if ($item->product->image)
                                    <img src="{{ Storage::url('products/' . $item->product->image) }}" class="img-fluid" width="128px">
                                @else
                                    <p>No image available</p>
                                @endif
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                                <h6 class="mb-0">{{ $item->product->name }}</h6>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-link px-2"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input id="quantity_{{ $item->id }}" min="0" name="quantity" value="{{ $item->quantity }}" type="number" 
                                    class="form-control form-control-sm" 
                                    oninput="updatePrice({{ $item->id }}, {{ $item->price }})">
                            </div>
                            <div class="d-flex col-md-5 col-lg-2 col-xl-2 offset-lg-1">
                                <form action="{{ route('cart.remove', $item->product_id) }}" method="POST" class="m-2 me-4">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm p-1">Delete</button>
                                </form>
                                <h6 id="total_price_{{ $item->id }}" class="mb-0 text-success text-sm font-weight-bolder" 
                                    data-price="{{ $item->price }}">
                                    {{ $item->price * $item->quantity }} VND
                                </h6>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                            </div>
                        @endforeach

                    @else
                        <div class="text-center mt-5">
                            <h4>Giỏ hàng của bạn đang trống.</h4>
                            <a href="{{URL::to('/product_user')}}" class="btn btn-primary mt-3">Tiếp tục mua sắm</a>
                        </div>
                    @endif
                </div>

                  <hr class="my-7">

                  <div class="pt-2">
                    <h6 class="mb-0"><a href="{{URL::to('/product_user')}}" class="text-body"><i
                          class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-body-tertiary">

              <div class="p-5 " style="background-color: #f0f0f0;">
                
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
            
                <h6 class="text-uppercase mb-2">Địa chỉ nhận hàng</h6>
                <div class="pb-2">

                    @if ($tempAddress)
                        <input type="text" class="form-control" value=" {{ $tempAddress }}" readonly>
                    @elseif(auth()->check() && !empty(auth()->user()->address))
                        <input type="text" class="form-control" value="{{ auth()->user()->address }}" readonly>
                    @else
                        <input type="text" class="form-control" placeholder="Chọn địa chỉ của bạn" readonly>
                    @endif

                </div>
            
                <div>
                    <a href="{{ route('map.select') }}">
                        {{-- <h6 class="">Thay đổi</h6> --}}
                        @if(auth()->check() && !empty(auth()->user()->address||$tempAddress))
                            <button class="btn btn-primary" >Thay đổi địa chỉ</button>
                        @else
                            <button class="btn btn-primary" >Chọn địa chỉ</button>
                        @endif
                    </a>
                </div>  
                
                <h6 class="text-uppercase pt-3">Số điện thoại</h6>
                <div class="pb-2 p2-4">
                    <!-- Hiển thị số điện thoại của người dùng nếu đã đăng nhập -->
                    @if(auth()->check() && !empty(auth()->user()->phone))
                        <input type="text" class="form-control" value="{{ auth()->user()->phone }}" readonly>
                    @else
                        <!-- Nếu chưa có số điện thoại, hiển thị input với placeholder "Điện thoại của bạn" -->
                        <input type="text" class="form-control" placeholder="Điện thoại của bạn" readonly>
                    @endif
                </div>
                <div class="mb-4 pb-2">
                    @if(auth()->check() && !empty(auth()->user()->phone))
                        <!-- Hiển thị nút "Thay đổi số điện thoại" nếu người dùng đã có số điện thoại -->
                        <button id="show-modal-btn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Thay đổi số điện thoại</button>
                    @else
                        <!-- Hiển thị nút "Cập nhật số điện thoại" nếu người dùng chưa có số điện thoại -->
                        <button id="show-modal-btn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Cập nhật số điện thoại</button>
                    @endif
                </div>
                

                <form action="{{route('cart_oder.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Điện thoại</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card text-center mb-3">
                                        <div class="card-body">
                                            <h5 class="card-title">Cập nhật số điện thoại</h5>
                                            <div class="form-group">
                                                <label for="phone">Số điện thoại:</label>
                                                <input type="text" id="phone" name="phone" class="form-control" value="">
                                            </div>
                                        </div>
                                    </div>                
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Thêm script để thay đổi số điện thoại -->
                <script>
                    // Khi nhấn nút thay đổi số điện thoại, hiển thị ô nhập số điện thoại tạm
                    document.getElementById('change-phone-btn')?.addEventListener('click', function () {
                        document.getElementById('temp-phone-input').style.display = 'block';
                        document.getElementById('default-phone').style.display = 'none';
                        this.style.display = 'none'; // Ẩn nút thay đổi
                    });
                </script>
                
                
            
                <hr class="my-4">

                <h5 class="text-uppercase mb-3">Phương thức thanh toán</h5>
                <div class="mb-4 pb-2">
                    <select id="payment-method" name="payment_method" data-mdb-select-init required>
                        <option value="" disabled selected>Chọn phương thức thanh toán</option>
                        <option value="1">Thanh toán khi nhận hàng</option>
                        <option value="2">Chuyển khoản ngân hàng</option>
                    </select>
                </div>
            
                <hr class="my-4">
            
                <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Total price:</h5>
                    <h6 id="total_price">
                        @if ($order && $order->items->count() > 0)
                            @if(auth()->check())
                                {{ $order->items->sum(fn($item) => $item->price * $item->quantity) ?? 0 }} VND
                            @else
                                0 VND
                            @endif
                        @else
                            0 VND
                        @endif
                    </h6>     
                </div>

                @php
                    $user = auth()->user();
                @endphp

                <form id="payment-form" action="{{ route('shipping.update', $order ? $order->id : '') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="payment-method-value" name="selected_payment_method" value="">
                
                    @if ($order && $order->items->count() > 0)
                        @foreach ($order->items as $item)
                            <input type="hidden" name="quantities[{{ $item->id }}]" value="{{ $item->quantity }}">
                        @endforeach
                        <button type="submit" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">
                            Mua Hàng
                        </button>
                    @else
                        <p class="text-danger">Giỏ hàng không tồn tại.</p>
                    @endif
                </form>
                

            
            </div>
            
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
    function updatePrice(itemId, price) {
        const quantity = document.getElementById('quantity_' + itemId).value;
        const totalPrice = price * quantity;

        // Cập nhật giá của sản phẩm
        document.getElementById('total_price_' + itemId).textContent = totalPrice + ' VND';

        // Cập nhật tổng giá của đơn hàng
        updateTotalPrice();
    }

    function updateTotalPrice() {
        let total = 0;

        // Duyệt qua tất cả các sản phẩm trong giỏ hàng
        document.querySelectorAll('[id^="quantity_"]').forEach(input => {
            const itemId = input.id.split('_')[1];
            const price = parseFloat(document.getElementById('total_price_' + itemId).dataset.price);
            const quantity = parseInt(input.value, 10) || 0;
            total += price * quantity;
        });

        // Cập nhật tổng giá đơn hàng
        document.getElementById('total_price').textContent = total + ' VND';
    }
</script>


<script>
    document.getElementById('payment-method').addEventListener('change', function () {
        const paymentMethod = this.value;

        // Nếu phương thức thanh toán là chuyển khoản ngân hàng (value = 2)
        if (paymentMethod === '2') {
            // Điều hướng đến trang thông tin thanh toán
            window.location.href = "{{ route('payment.infor') }}";
        }
    });

    document.getElementById('payment-form').addEventListener('submit', function (event) {
        const paymentMethod = document.getElementById('payment-method').value;

        if (!paymentMethod) {
            event.preventDefault();
            alert('Vui lòng chọn phương thức thanh toán!');
        } else {
            // Gán giá trị phương thức thanh toán vào input ẩn để gửi đến backend
            document.getElementById('payment-method-value').value = paymentMethod;
        }
    });

</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@endsection