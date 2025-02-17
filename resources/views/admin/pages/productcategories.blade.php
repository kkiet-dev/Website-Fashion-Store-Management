@extends('admin.home')
@section('categories_product_content')
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
            <div class="card-header pb-0">
              <h5>PRODUCT PAGE</h5>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th> --}}
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Prodouct_id</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category_id</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">TItle</th>
                      {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">description</th> --}}
                      {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Quantity</th> --}}
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Create_at</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Update_at</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  @foreach($productcategories as $categories)
                  <tbody>
                    <tr>
                    
                        {{-- product id --}}
                      <td>
                        <div class="d-flex px-3 py-1">
                          <div class="align-middle text-center">
                            <div class="col-1">{{ $categories->id }}</div>
                          </div>
                        </div>
                      </td>
                      {{-- product name --}}
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $categories->product_id }}</p>
                        <p class="text-xs text-secondary mb-0">Organization</p>
                      </td>
                      {{-- product phone --}}
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $categories->category_id}}</p>
                      </td>
                      {{-- product adress --}}
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">{{ $categories->title}}</p>
                      </td>
                      {{-- --------- --}}
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $categories->created_at}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $categories->update_at}}</span>
                      </td>
                 
                      <td class="align-middle">
                          <a  class="btn btn-warning text-secondary font-weight-bold text-xs"> 
                              Edit
                          </a>

                          <a  class="btn btn-danger text-secondary font-weight-bold text-xs"> 
                              Delete
                          </a>
                          {{-- href="{{ route('products.edit', $categories->id) }}" --}}

                          {{-- <form action="{{ route('admin.layouts.products', $categories->id) }}" method="POST" style="display:inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger text-secondary font-weight-bold text-xs">
                                  Delete
                              </button>
                          </form> --}}
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