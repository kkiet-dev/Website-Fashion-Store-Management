@extends('admin.home') {{-- Kế thừa layout chính --}}

@section('oder_content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h5> PRODUCT ODER </h5>
            </div>
              @if (session('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
              @endif
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table table-bordered table-striped">
                  <thead>

                    <tr class="table-dark">
                      
                      <th class="text-uppercase text-white text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-white text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Order-Name</th>
                      <th class="text-uppercase text-white text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Oder-id</th>
                      <th class="text-center text-white text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total-price</th>
                      <th class="text-center text-white text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Creted-at</th>
                      <th class="text-center text-white text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>

                    </tr>

                  </thead>

                  @foreach($shipping as $shippings)
                  <tbody>
                    <tr class="col-12">
            
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div class="align-middle text-center">
                            <div class="col-1">{{ $shippings->id}}</div>
                          </div>
                        </div>
                      </td>

                      <td class="col-2">
                        <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $shippings ->user->name ?? 'Không xác định' }}</p>
                      </td>
                      
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0 text-wrap">{{ $shippings->order_id }}</p>
                      </td>

                      <td class="col-1 align-middle text-center ">
                        <p class="text-xs font-weight-bold mb-0">{{ $shippings->price ?? 'No description available' }}</p>
                      </td>
                      
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $shippings->created_at ?? 'No description available' }}</span>
                      </td>
                    
                      <td class="align-middle text-center">
                        <a href="{{ route('oder.detail', $shippings->id) }}" class="btn btn-primary">Detail</a>
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
