<head>
  <style>
    .small-icon { 
      width: 128px; 
    }
  </style>
</head>
<footer class="footer bg-dark pt-5 mt-5">
    <hr class="horizontal dark mb-5">
    <div class="container">
      <div class=" row">
  
        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
               <h6 class="">               
                  <i class=""><img src="{{asset('assets/img/icons/shop.png')}}" alt="" class="small-icon"></i>
              </h6>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <p class="nav-link  text-white">Gửi gắm yêu thương.!</p>
              </li>
            </ul>
          </div>
        </div>
  
        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h3 class="text-gradient text-primary text-sm">Shop_KT</h3>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link text-white" href="{{URL:: to('/')}}" target="_blank">
                  Giới thiệu
                </a>
              </li>
  
              <li class="nav-item">
                <a class="nav-link text-white" href="{{URL::to('/shop_address')}}" target="_blank">
                  Tìm cửa hàng
                </a>
              </li>
            </ul>
          </div>
        </div>

        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h3 class="text-gradient text-primary text-sm">Liên hệ</h3> 
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link text-white">
                  <img src="{{asset('assets/img/email.png')}}" alt="" class="pe-2" style="width:20px">kts@gmail.com
                </a>
              </li>
  
              <li class="nav-item">
                <a class="nav-link text-white">
                  <img src="{{asset('assets/img/phone1.png')}}" alt="" class="pe-2" style="width:20px">0378123111
                </a>
              </li>
              

              <li class="nav-item">
                <a class="nav-link text-white" href="{{route('contact.show')}}">
                  <img src="{{asset('assets/img/send.png')}}" alt="" class="pe-2" style="width:20px">contact about us
                </a>
              </li>

            </ul>
          </div>
        </div>
  
        <div class="col-md-2 col-sm-6 col-6 mb-4">
          <div>
            <h3 class="text-gradient text-primary text-sm">Hỗ trợ</h3>
            <ul class="flex-column ms-n3 nav">
              <li class="nav-item">
                <a class="nav-link text-white" href="{{URL:: to('/transport')}}">
                  Vận chuyển
                </a>
              </li>
  
              <li class="nav-item">
                <a class="nav-link text-white" href="{{URL::to('/return_policy')}}">
                  Chính sách đổi trả
                </a>
              </li>

            </ul>
          </div>
        </div>
  
        {{-- <div class="col-md-2 col-sm-6 col-6 mb-4 me-auto">
          <div>
            <h3 class="text-gradient text-primary text-sm">Legal</h3>
          </div>
        </div> --}}
  
        <div class="col-12">
          <div class="text-center">
            <p class="my-4 text-sm text-white">
              Shop-Kt <script>document.write(new Date().getFullYear())</script> Cảm ơn và hẹn gặp lại bạn.!.
            </p>
          </div>
        </div>
      </div>
    </div>
  </footer>