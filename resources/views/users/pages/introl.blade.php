@extends('users.home')
@section('introl_content')
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

{{-- slider pages --}}
<header class="header-2"> 

    <link rel="stylesheet" href="{{asset('assets/css/lider.css')}}">

    <div id="sliderCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2750">
      <div class="carousel-inner">
        @foreach($sliders as $index => $slider)
          <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
            <div class="page-header min-vh-75 relative d-flex justify-content-center" style="background-image: url('{{ $slider->image ? Storage::url('products/' . $slider->image) : asset('#') }}">
              <div class="carousel-content ">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12 text-center mx-auto">
                      <h1 class="text-white pt-2 mt-n5 text-dark">{{$slider->name}}</h1>
                      <p class="lead text-white mt-3">{{$slider->description}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    
      <!-- Optional: Add controls (next/prev buttons) if needed -->
      <button class="carousel-control-prev" type="button" data-bs-target="#sliderCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#sliderCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="position-absolute w-100 z-index-1 bottom-0">
      <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
          <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="moving-waves">
          <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
          <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
          <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
          <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
          <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
          <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />
        </g>
      </svg>
    </div>
  </div>
</header>

<section class="pt-3 pb-4" id="count-stats">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 z-index-2 border-radius-xl mt-n10 mx-auto py-3 blur shadow-blur">
        <div class="row">
          <div class="col-md-4 position-relative">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-dark"><span id="state1" countTo="{{ $totalQuantity}}">0</span>+</h1>
              <h5 class="mt-3">Các sản phẩm mới</h5>
              <p class="text-sm">Hơn        
            sản phẩm mới đã có mặt tại shop kt</p>
            </div>
            <hr class="vertical dark">
          </div>
          <div class="col-md-4 position-relative">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-dark"> <span id="state2" countTo="15">0</span>+</h1>
              <h5 class="mt-3">Trải nghiệm</h5>
              <p class="text-sm">Hãy đến shop kt để trải nghiệm 15 sản phẩm hot trong tháng</p>
            </div>
            <hr class="vertical dark">
          </div>
          <div class="col-md-4">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-dark" id="state3" countTo="4">0</h1>
              <h5 class="mt-3">Sale</h5>
              <p class="text-sm">Sale kinh điển trong tháng, hãy tận dụng ngay</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <section class="my-5 py-5">
    <div class="container">
        <div class="row align-items-center">
              @if($articles->isEmpty())
                  <p class="text-center">No articles available.</p>
              @else
                  @foreach($articles as $article)
                      <div class="col-md-6 col-12 mt-3">
                          <div class="info">
                              <div class="icon icon-sm">
                                <svg class="text-dark" width="25px" height="25px" viewBox="0 0 42 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                  <title>office</title>
                                  <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                  <g transform="translate(-1869.000000, -293.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                  <g transform="translate(1716.000000, 291.000000)">
                                      <g id="office" transform="translate(153.000000, 2.000000)">
                                          <path class="color-background" d="M12.25,17.5 L8.75,17.5 L8.75,1.75 C8.75,0.78225 9.53225,0 10.5,0 L31.5,0 C32.46775,0 33.25,0.78225 33.25,1.75 L33.25,12.25 L29.75,12.25 L29.75,3.5 L12.25,3.5 L12.25,17.5 Z" opacity="0.6"></path>
                                          <path class="color-background" d="M40.25,14 L24.5,14 C23.53225,14 22.75,14.78225 22.75,15.75 L22.75,38.5 L19.25,38.5 L19.25,22.75 C19.25,21.78225 18.46775,21 17.5,21 L1.75,21 C0.78225,21 0,21.78225 0,22.75 L0,40.25 C0,41.21775 0.78225,42 1.75,42 L40.25,42 C41.21775,42 42,41.21775 42,40.25 L42,15.75 C42,14.78225 41.21775,14 40.25,14 Z M12.25,36.75 L7,36.75 L7,33.25 L12.25,33.25 L12.25,36.75 Z M12.25,29.75 L7,29.75 L7,26.25 L12.25,26.25 L12.25,29.75 Z M35,36.75 L29.75,36.75 L29.75,33.25 L35,33.25 L35,36.75 Z M35,29.75 L29.75,29.75 L29.75,26.25 L35,26.25 L35,29.75 Z M35,22.75 L29.75,22.75 L29.75,19.25 L35,19.25 L35,22.75 Z"></path>
                                      </g>
                                  </g>
                                  </g>
                                  </g>
                                </svg>
                              </div>
                              <h5 class="font-weight-bolder mt-3">{{ $article->name }}</h5>
                              <p class="pe-5">{{ $article->description }}</p>
                          </div>
                      </div>
                  @endforeach
              @endif
          </div>
      </div>
  </section>

  <section class="my-5 py-5">
    <div class="container">
      <div class="row">
        <div class="row justify-content-center text-center my-sm-5">
          <div class="col-lg-6">
            <h2 class="text-dark mb-0">Không Gì Là Không Thể</h2>
            <h2 class="text-primary text-gradient">Hãy Một Là Chính Bản Thân Mình</h2>
          </div>
        </div>
      </div>
    </div>
  </section>

</section>

<div id="bannerSlider" class="carousel slide container mt-sm-5" data-bs-ride="carousel">
  <!-- Indicators -->
  <div class="carousel-indicators">
    @foreach($baners as $index => $baner)
      <button type="button" data-bs-target="#bannerSlider" data-bs-slide-to="{{ $index }}" 
              class="{{ $loop->first ? 'active' : '' }}" aria-current="{{ $loop->first ? 'true' : 'false' }}" 
              aria-label="Slide {{ $index + 1 }}"></button>
    @endforeach
  </div>

  <!-- Slides -->
  <div class="carousel-inner">
    @foreach($baners as $index => $baner)
    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
      <div class="slide" style="background-image: url('{{ Storage::url('products/' . $baner->image) }}'); min-height: 50vh; background-size: cover; background-position: center;">
        <span class="mask bg-gradient-dark"></span>
        <div class="container">
          <div class="row">
            <div class="col-lg-6 ms-lg-5">
              <h1 class="text-white">{{ $baner->name }}</h1>
              <p class="lead text-white opacity-8">{{ $baner->description }}</p>
              <a href="https://www.creative-tim.com/learning-lab/bootstrap/overview/soft-ui-design-system" class="text-white icon-move-right">
                Read docs
                <i class="fas fa-arrow-right text-sm ms-1"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>

  <!-- Controls -->
  <button class="carousel-control-prev" type="button" data-bs-target="#bannerSlider" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#bannerSlider" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<style>
  .carousel-item .slide {
  min-height: 50vh;
  border-radius: 1rem;
  }
  .carousel-control-prev-icon,
  .carousel-control-next-icon {
    filter: invert(1);
  }
  .mask.bg-gradient-dark {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 1;
  }
</style>


{{-- Hot product --}}
<section class="py-5">

  <div class="container">
    <div class="row">
      <div class="row text-center my-sm-5 mt-5">
        <div class="col-lg-6 mx-auto">
          <h2 class="text-primary text-gradient mb-0">Hãy Để</h2>
          <h2 class="">Chúng tôi làm điều đó cho bạn</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-8">
        <div class="row mt-4">
          @foreach($terms as $term)
          <div class="col-md-6">
              <div class="card move-on-hover">
                @if ($term->image)
                    <img class="w-100" src="{{ Storage::url('products/' . $term->image) }}" alt="Product Image">
                @else
                    <img class="w-100" src="https://raw.githubusercontent.com/creativetimofficial/public-assets/master/soft-ui-design-system/presentation/section-pages/about-us.jpg" alt="Default Image">
                @endif
              </div>
              <div class="mt-2 ms-2">
                <h4 class="mb-0">{{$term->name}}</h4>
                <p class="mb-0 ">{{$term->description}}</p>
              </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="col-md-3 mx-auto mt-md-0 mt-5">
        <div class="position-sticky" style="top:100px !important">
          <h4 class="">Chẳng Điều Gì Là Không Thể</h4>
          <h6 class="text-secondary">chúng tôi mang đến cho bạn những bộ sưu tập thời trang độc đáo, đầy cá tính và phù hợp với xu hướng hiện đại.</h6>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

