@extends('users.home')
@section('about_content')
<section class="pt-sm-8 pb-5 position-relative bg-gradient-dark">
    <div class="position-absolute w-100 z-inde-1 top-0 mt-n3">
      <svg width="100%" viewBox="0 -2 1920 157" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <title>wave-down</title>
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g fill="#FFFFFF" fill-rule="nonzero">
            <g id="wave-down">
              <path d="M0,60.8320331 C299.333333,115.127115 618.333333,111.165365 959,47.8320321 C1299.66667,-15.5013009 1620.66667,-15.2062179 1920,47.8320331 L1920,156.389409 L0,156.389409 L0,60.8320331 Z" id="Path-Copy-2" transform="translate(960.000000, 78.416017) rotate(180.000000) translate(-960.000000, -78.416017) "></path>
            </g>
          </g>
        </g>
      </svg>
    </div> 
    <div class="container">
      @foreach ($categories as $category)
      <div class="row">
          <div class="col-md-8 text-start mb-5 mt-5">
              <h3 class="text-white z-index-1 position-relative">{{ $category->name }}</h3>
              <p class="text-white opacity-8 mb-0">
              </p>
          </div>
      </div>

      <div class="row mt-4 pb-4">
          @foreach($products as $product)
              @if ($product->category_id == $category->id)
              <div class="col-lg-6 col-12 mb-4">
                  <div class="card card-profile overflow-hidden">
                      <div class="row" onclick="redirectToDetail({{ $product->id }})">
                          <div class="col-lg-4 col-md-6 col-12 pe-lg-0">
                              <a href="javascript:;">
                                  <div class="p-3 pe-md-0" >
                                      @if ($product->image)
                                      <img src="{{ Storage::url('products/' . $product->image) }}" class="img-fluid" width="128px">
                                      @else
                                      <p>No image available</p>
                                      @endif
                                  </div>
                              </a>
                          </div>
                          <div class="col-lg-8 col-md-6 col-12 ps-lg-0 my-auto">
                              <div class="card-body">
                                  <h5 class="mb-0">{{ $product->name }}</h5>
                                  <h6 class="text-info">{{ $product->price }}</h6>
                              </div>
                          </div>
                      </div>
                    
                      <form action="{{ route('cart.add', $product->id) }}" method="POST">
                          @csrf
                          <button type="submit" class="btn btn-success ms-3" style="width: 24%" >Add to cart</button>
                      </form>
                  </div>
              </div>
              @endif
          @endforeach
      </div>
      @endforeach
      
    </div>

    <div class="position-absolute w-100 bottom-0 mn-n1">
      <svg width="100%" viewBox="0 -1 1920 166" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <title>wave-up</title>
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(0.000000, 5.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <g id="wave-up" transform="translate(0.000000, -5.000000)">
              <path d="M0,70 C298.666667,105.333333 618.666667,95 960,39 C1301.33333,-17 1621.33333,-11.3333333 1920,56 L1920,165 L0,165 L0,70 Z" fill="#f8f9fa"></path>
            </g>
          </g>
        </g>
      </svg>
    </div>
</section>

<script>
  function redirectToDetail(productId) {
      window.location.href = `/product_detail/${productId}`;
  }
</script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



@endsection