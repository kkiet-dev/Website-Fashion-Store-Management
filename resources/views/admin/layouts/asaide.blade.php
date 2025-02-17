<head>
  <style>
    .small-icon { 
      width: 20px; height: 20px;
    }
  </style>
</head>
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="{{URL::to('/dashboard')}}">
        <img src="{{asset('assets/img/logo_shop.png')}}" class="navbar-brand-img h-100" alt="main_logo" style="max-height: 4rem;">
        <span class="ms-1 font-weight-bold">Shop KT</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="{{URL::to('/dashboard')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{URL::to('/products')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class=""><img src="{{asset('assets/img/icons/boxes.png')}}" alt="" class="small-icon"></i>
            </div>
            <span class="nav-link-text ms-1">Product</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{URL::to('/product_categories')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10 dark"></i>
            </div>
            <span class="nav-link-text ms-1">Product_category</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{URL::to('/oder')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class=""><img src="{{asset('assets/img/icons/order.png')}}" alt="" class="small-icon"></i>
            </div>
            <span class="nav-link-text ms-1">Order</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{URL::to('/users')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              {{-- <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i> --}}
              <i class=""><img src="{{asset('assets/img/icons/user.png')}}" alt="" class="small-icon"></i>
            </div>
            <span class="nav-link-text ms-1">Users</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{URL::to('/slider')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class=""><img src="{{asset('assets/img/icons/slider.png')}}" alt="" class="small-icon"></i>
            </div>
            <span class="nav-link-text ms-1">Slider</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="{{URL::to('/term')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class=""><img src="{{asset('assets/img/icons/terms.png')}}" alt="" class="small-icon"></i>
            </div>
            <span class="nav-link-text ms-1">Terms</span>
          </a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link " href="{{URL::to('/baner')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class=""><img src="{{asset('assets/img/icons/ad.png')}}" alt="" class="small-icon"></i>
            </div>
            <span class="nav-link-text ms-1">Baners</span>
          </a>
        </li>

        
        <li class="nav-item">
          <a class="nav-link " href="{{URL::to('/article')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class=""><img src="{{asset('assets/img/icons/blog.png')}}" alt="" class="small-icon"></i>
            </div>
            <span class="nav-link-text ms-1">Posts</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link " href="{{URL::to('/contact_ad')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class=""><img src="{{asset('assets/img/icons/card.png')}}" alt="" class="small-icon"></i>
            </div>
            <span class="nav-link-text ms-1">Contact</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        @if($user = Auth::check())
        <li class="nav-item">
          <a class="nav-link " href="{{URL::to('/login')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign Up</span>
          </a>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link " href="{{URL::to('/signup')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-collection text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sign in</span>
          </a>
        </li>
        @endif
      </ul>
    </div>
    <div class="sidenav-footer mx-3 ">
      
      <div class="d-flex align-items-center justify-content-center">
       
      </div>
    </div>
  </aside>