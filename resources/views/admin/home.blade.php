
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  {{-- <link rel="icon" type="image/png" href="assets/img/favicon.png"> --}}
  <link rel="icon" type="image/png" href="{{asset('assets/img/icons/shop.png')}}">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css'>
  <link rel="stylesheet" href="@import url('https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-straight/css/uicons-solid-straight.css')">
  <title>
    Shop-KT
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
<link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />

<!-- Font Awesome Icons -->
<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

<!-- CSS Files -->
<link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css?v=2.0.4') }}" rel="stylesheet" />

</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  @include('admin.layouts.asaide')

  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
        @include('admin.layouts.navbar')
    <!-- End Navbar -->
      <!--pages-->
        @yield('dashboard_content')

        @yield('product_content')

        @yield('product_edit_content')

        @yield('product_create_content')

        @yield('product_category_content')

        @yield('product_category_create_content')

        @yield('product_category_edit_content')

        @yield('users_content')

        @yield('billing_content')

        @yield('profile_content')

        @yield('user_edit_content')

        @yield('slider_content')

        @yield('slider_create_content')

        @yield('slider_edit_content')

        @yield('oder_content')

        @yield('oder_detail_content')

        @yield('term_content')

        @yield('term_create_content')

        @yield('term_edit_content')

        @yield('baner_content')

        @yield('baner_create_content')

        @yield('baner_edit_content')

        @yield('article_content')

        @yield('article_create_content')

        @yield('article_edit_content')

        @yield('contact_content')

       
      <!--end pages-->
  </main>

  @include('admin.layouts.core')
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <script src="{{ asset('assets/js/argon-dashboard.min.js?v=2.0.4') }}"></script>

  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");
  
    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
  
    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6
  
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <script>
    // Hiển thị alert và tự động ẩn sau 2 giây (2000ms)
    setTimeout(function() {
        const alertBox = document.querySelector('.alert'); // Thay .alert bằng class hoặc id của alert nếu khác
        if (alertBox) {
            alertBox.style.display = 'none'; // Ẩn alert sau 2 giây
        }
    }, 3000);
  </script>
</body>

</html>