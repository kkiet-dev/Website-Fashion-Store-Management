

@extends('admin.home')
@section('term_content')
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
              <h6>TERM</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Create_at</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Update_at</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  @foreach($terms as $term)
                  <tbody>
                    <tr>
                      {{-- user pictrue --}}
                      <td>          
                        <div class="align-middle text-center">
                          <div class="align-middle text-center">
                            <div>
                              @if ($term->image)
                                  {{-- <img src="{{ Storage::url('products/' . $user->image) }}" class="img-fluid" width="64PX"> --}}
                                  <img src="{{ Storage::url('products/' . $term->image) }}" class="img-fluid" width="64PX">
                              @else
                                  <p>No image available</p>
                              @endif
                            </div>
                          </div>
                      </td>
                        {{-- user id --}}
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <div class="col-1">{{ $term->id }}</div>
                          </div>
                        </div>
                      </td>

                   {{-- user name --}}
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $term->name }}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-wrap clamp-text">{{ $term->description}}</p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $term->created_at}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $term->updated_at}}</span>

                      </td>
                      <td class="align-middle">
                          <a href="{{ route('term.edit', $term->id) }}" class="btn btn-warning text-secondary font-weight-bold text-xs">
                              Edit
                          </a>
                          <a>
                            <form method="POST" action="{{ route('term.delete', $term->id) }}" style="display: inline-block;">
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
            <div class="p-4">
                {{-- <button type="button" class="btn btn-primary">add</button> --}}
                <a type="button" href="{{ route('term.create') }}" class="btn btn-primary text-white font-weight-bold text-xs">
                   Add
                 </a>
              </div>
          </div>
        </div>
      </div>
    </div>

@endsection