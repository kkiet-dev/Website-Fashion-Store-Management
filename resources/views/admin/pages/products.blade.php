@extends('admin.home')
@section('product_content')
<head>
  <style>
    .clamp-text {
      display: -webkit-box;
      -webkit-line-clamp: 2; /* Hiển thị tối đa 2 dòng */
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
      word-break: break-word; /* Tự động xuống dòng nếu cần */
    }
  </style>
</head>

  <div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="col-12 d-flex card-header pb-0">
              <div class="col-6 card-header pb-0">
                <h5>PRODUCT PAGE</h5>
              </div>
              <div class="col-6 p-4 d-flex justify-content-end">
                {{-- <button type="button" class="btn btn-primary">add</button> --}}
                <a type="button" href="{{ route('products.create') }}" class="btn btn-primary text-white font-weight-bold text-xs">
                   Add
                 </a>
              </div>
            </div>
           
              @if (session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                {{-- <table class="table align-items-center mb-0"> --}}
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr class="table-dark">
                      
                      <th class="text-uppercase text-white text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-white text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                      <th class="text-uppercase text-white text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-uppercase text-white text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name Category</th>
                      <th class="text-center text-white text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="text-center text-white text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                      <th class="text-center text-white text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th>
                      <th class="text-center text-white text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Create_at</th>
                      <th class="text-center text-white text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Update_at</th>
                      <th class="text-center text-white text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ACTIONS</th>
                    </tr>
                  </thead>
                  @foreach($products as $product)
                  <tbody>
                    <tr class="col-12">
                    
                        {{-- product id --}}
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="align-middle text-center">
                            <div class="col-1">{{ $product->id }}</div>
                          </div>
                        </div>
                      </td>
                      {{-- product pictrue --}}
                      <td class="col-2">
                        <div class="align-middle text-center">
                          <div>
                            {{-- @if ($product->image) --}}
                            @if ($product->image)
                                {{-- <img src="{{ asset('storage'.$product->path ) }}"  class="img-fluid" width="64PX"> --}}
                                <img src="{{ Storage::url('products/' . $product->image) }}" class="img-fluid" width="64PX">
                                {{-- <img src="{{ Storage::url('storage/products/1732378908.jpg') }}" class="img-fluid" width="64PX"> --}}
                                {{-- <img src="{{ asset('storage/products/1732378908.jpg') }}"  class="img-fluid" width="64PX"> --}}
                            @else
                                <p>No image available</p>
                            @endif
                          </div>
                        </div>
                      </td>
                      {{-- product name --}}
                      <td class="col-2">
                        <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $product->name }}</p>
                      </td>
                       {{-- name category --}}
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $product->category->name }}</p>
                      </td>
                      {{-- product description --}}
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-wrap clamp-text">{{ $product->description }}</p>
                      </td>
                      {{-- product price --}}
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">{{ number_format($product->price, 0, ',', ',') }}</p>
                      </td>
                      <td class="col-1 align-middle text-center ">
                        <p class="text-xs font-weight-bold mb-0">{{ $product->quantity }}</p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $product->created_at }}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $product->updated_at }}</span>
                      </td>
                    
                      <td class="align-middle">
                          <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning text-secondary font-weight-bold text-xs">
                            Edit
                           </a>

                          {{-- <a  class="btn btn-danger text-secondary font-weight-bold text-xs"> 
                              Delete
                          </a> --}}
                          
                          {{-- href="{{ route('products.edit', $product->id) }}" --}}
                          <a>
                            <form method="POST" action="{{ route('products.delete', $product->id) }}" style="display: inline-block;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger text-secondary font-weight-bold text-xs">
                                  Delete
                              </button>
                            </form>
                          </a>
                      </td>
                    </tr>
            
                  </tbody>
                  @endforeach
                </table>   
              </div>        
            </div>
         
          </div>
        </div>
    </div>
  </div>

@endsection
