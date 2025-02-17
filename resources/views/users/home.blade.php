<!--
* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>

<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets_users/img/apple-icon.png')}}">
{{-- <link rel="icon" type="image/png" href="{{ asset('assets_users/img/favicon.png')}}"> --}}
<link rel="icon" type="image/png" href="{{asset('assets/img/icons/shop.png')}}" style="width: 32px">

<title>
  Soft UI Design 3 System by Creative Tim
</title>

<!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />

<!-- Nucleo Icons -->
<link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
<link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- CSS Files -->

<link id="pagestyle" href="{{ asset('assets_users/css/soft-design-system.css?v=1.1.0')}}" rel="stylesheet" />

<link rel="stylesheet" href="{{ asset('assets_users/css/cart.css') }}">


<!-- Nepcha Analytics (nepcha.com) -->
<!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
<script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
{{-- <style >
  .cart{
      border:3px solid #00ff00;
      width:auto;
      height:85vh;
      overflow-x:hidden;
      overflow-y:auto;
  }
</style> --}}
</head>

<body class="index-page">
  
   <!-- Navbar -->
<div class="container position-sticky z-index-sticky top-0">
  <div class="row">
    <div class="col-12">
      @include('users.layouts.navbar')
  <!-- End Navbar -->
    </div>
  </div>
</div>


<section class="pt-0 pb-4" id="count-stats">

  
    @yield('introl_content')
    
    @yield('about_content')
    
    
    @yield('cart_content')

   

    @yield('payment_infor_content')

    @yield('product_trousers_content')

    @yield('product_jackets_content')
    
    @yield('product_Tshirts_content') 

    @yield('product_carpri_content') 

    @yield('shipping_content')

    @yield('contact_content')

    @yield('return_policy_content')

    @yield('transport_content')
    
    <div class="pt-6">
      @yield('product_detail_content')
    </div>

   
  

</section>


@include('users.layouts.footer')


<!--   Core JS Files   -->
<script src="{{ asset('assets_users/js/core/popper.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets_users/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset('assets_users/js/plugins/perfect-scrollbar.min.js')}}"></script>

<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
<script src="{{ asset('assets_users/js/plugins/countup.min.js')}}"></script>

<script src="{{ asset('assets_users/js/plugins/choices.min.js')}}"></script>

<script src="{{ asset('assets_users/js/plugins/prism.min.js')}}"></script>
<script src="{{ asset('assets_users/js/plugins/highlight.min.js')}}"></script>

<!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
<script src="{{ asset('assets_users/js/plugins/rellax.min.js')}}"></script>
<!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
<script src="{{ asset('assets_users/js/plugins/tilt.min.js')}}"></script>
<!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
<script src="{{ asset('assets_users/js/plugins/choices.min.js')}}"></script>


<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="{{ asset('assets_users/js/plugins/parallax.min.js')}}"></script>

<!-- Control Center for Soft UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
<script src="{{ asset('assets_users/js/soft-design-system.min.js?v=1.1.0')}}" type="text/javascript"></script>
<script>

  setTimeout(function() {
      const alertBox = document.querySelector('.alert'); 
      if (alertBox) {
          alertBox.style.display = 'none'; 
      }
  }, 3500);
</script>


<script type="text/javascript">

  if (document.getElementById('state1')) {
    const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
    if (!countUp.error) {
      countUp.start();
    } else {
      console.error(countUp.error);
    }
  }
  if (document.getElementById('state2')) {
    const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
    if (!countUp1.error) {
      countUp1.start();
    } else {
      console.error(countUp1.error);
    }
  }
  if (document.getElementById('state3')) {
    const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
    if (!countUp2.error) {
      countUp2.start();
    } else {
      console.error(countUp2.error);
    };
  }
</script>

</body>

</html>


