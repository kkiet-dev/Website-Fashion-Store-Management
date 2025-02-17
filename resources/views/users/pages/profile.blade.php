@extends('users.home')
@section('cart_content')
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<section class="vh-100 overflow-auto pt-4" style="background-color: #f4f5f7; height: 85vh;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
         <div class="row d-flex justify-content-center">
            <div class="col-lg-6 col-12">
                <div class="pr-alert">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{session('error')}}
                        </div>
                    @elseif(session('success'))
                        <div class="alert alert-success">
                            {{session('success')}}
                        </div>
                    @endif
                </div>
              <div class="card card-profile mt-lg-0 mt-5 overflow-hidden">
                <div class="row">
                    @if(auth()->check())
                      @php $user = auth()->user(); @endphp
                      <div class="col-lg-4 col-md-6 col-12 pe-lg-0">
                        <div class="p-3 pe-md-0">
                            @if ($user->image)
                            <img src="{{ Storage::url('products/' . $user->image) }}" alt="user_img" class="img-fluid">
                            @else
                                <img class="w-100 border-radius-md" src="{{asset('assets/img/image.png')}}" alt="" class="small-icon">            
                            @endif
                        </div>
                      </div>
                      <div class="col-lg-8 col-md-6 col-12 ps-lg-0 my-auto">
                          <div class="card-body">
                              <h5 class="mb-0">{{ $user->name }}</h5>
                              <h6 class="text-info">Người dùng</h6>
                              <p>Shop-Kt rất hân hạnh được tài trợ cùng {{$user->name}}</p>

                              <div class="ps-2">
                                <button id="show-modal-btn" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Cập nhật hồ sơ</button>
                            </div>
                            
                            <!-- Modal -->
                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Cập nhật hồ sơ</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card text-center mb-3">
                                                    @if($user->image)
                                                        <img src="{{ Storage::url('products/' . $user->image) }}" alt="user_img" class="img-fluid">
                                                    @else
                                                        <img src="{{ asset('assets/img/user.png') }}" class="card-img-top" alt="user image">

                                                    @endif
                                                    <div class="card-body">
                                                        <h5 class="card-title">Cập nhật ảnh đại diện</h5>
                                                        <div class="form-group">
                                                            <label for="image">Chọn ảnh:</label>
                                                            <input type="file" id="image" name="image" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone">Số điện thoại:</label>
                                                            <input type="text" id="phone" name="phone" class="form-control" value="{{ $user->phone }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="address">Địa chỉ:</label>
                                                            <input type="text" id="address" name="address" class="form-control" value="{{ $user->address }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email:</label>
                                                            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
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

                                  <!-- Bootstrap JS and dependencies -->
                                  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                                  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
                                  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                              {{-- </a> --}}
                          </div>
                      </div>
                   @else
                      <div class="col-lg-4 col-md-6 col-12 pe-lg-0">
                          <a href="javascript:;">
                              <div class="p-3 pe-md-0">
                                  <img class="w-100 border-radius-md" src="{{asset('assets/img/user.png')}}" alt="" class="small-icon">
                              </div>
                          </a>
                      </div>
                      <div class="col-lg-8 col-md-6 col-12 ps-lg-0 my-auto">
                          <div class="card-body">
                              <h5 class="mb-0">Guest</h5>
                              <p>No profile available</p>
                              <h6 class="text-info">Visitor</h6>
                              <p>Please log in to view your profile details.</p>
                          </div>
                      </div>
                    @endif
                    <div class="col-lg-8 col-md-6 col-12 ps-lg-0 my-auto">
                        <div class="card-body">
                            <h6>Information</h6>
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h6><img src="{{asset('assets/img/mail.png')}}" style="height: 5vh; padding:2px">Email</h6>
                                    <p class="text-muted">
                                        @if(auth()->check())
                                            {{ auth()->user()->email }}
                                        @else
                                            info@example.com
                                        @endif
                                    </p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6><img src="{{asset('assets/img/phone.png')}}" style="height: 5vh; padding:2px">Phone</h6>
                                    <p class="text-muted">
                                        @if(auth()->check() && !empty(auth()->user()->phone))
                                            {{ auth()->user()->phone }}
                                        @else
                                            037 ... ...
                                        @endif
                                    </p>
                                </div>
                            </div>
        
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <a href="{{URL::to('/shipping')}}">
                                        <h6><img src="https://down-vn.img.susercontent.com/file/f0049e9df4e536bc3e7f140d071e9078" style="height: 5vh">Đơn hàng</h6>
                                        <p class="text-muted">
                                            @if(auth()->check())
                                              
                                                Bấm vào để xem đơn hàng của bạn
                                            @else
                                                Vui lòng đăng nhập để xem đơn hàng
                                            @endif
                                        </p>
                                    </a>
                                    
                                </div>
                                <div class="col-6 mb-3">
                                    <h6><img src="{{asset('assets/img/gps.png')}}" style="height: 5vh; padding:2px">Address</h6>
                                    <p class="text-muted">
                                    
                                        @if(!auth()->check()) 
                                            <span>Vui lòng đăng nhập để cập nhật địa chỉ.</span>
                                        @elseif(auth()->check() && empty(auth()->user()->address)) 
                                            <span>Vui lòng cập nhật địa chỉ của bạn.</span>
                                        @else 
                                             {{ auth()->user()->address }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <hr width="100%" size="5px" color="black" />
        
                            <div class="col-12 d-flex pt-1">
                                <div class="col-3">
                                    @if(auth()->check())
                                    <form action="{{ route('logout') }}" method="POST">
                                        <div class="float-stard mt-2">
                                        @csrf
                                        <button type="submit" name="logout" id="logout" class="btn btn-outline-danger btn-sm"  style="hight:1em" required>
                                            logout                
                                        </button>
                                        </div>
                                    </form>
                                    @else
                                    
                                        <div class="float-start mt-2">
                                            <a href="{{ route('login') }}" style="height:1em">
                                                <button class="btn btn-outline-danger btn-sm"  style="hight:1em" required>
                                                login                
                                                </button>
                                            </a>
                                        
                                        </div>
                                    @endif
                                </div>
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                      
                                    @if (session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
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
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection