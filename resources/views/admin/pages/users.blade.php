

@extends('admin.home')
@section('users_content')
    
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="d-flex col-12 card-header pb-0">
              <div class="col-6 d-flex justify-content-start">
                <h6>USERS</h6>
              </div>
              <div class="col-6 d-flex justify-content-end">
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
  
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
              </div>
            </div>
            
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Author</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phone</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Adress</th>
                      {{-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">description</th> --}}
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Create_at</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Update_at</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  @foreach($users as $user)
                  <tbody>
                    <tr>
                      {{-- user pictrue --}}
                      <td>          
                        <div class="align-middle text-center">
                          <div class="align-middle text-center">
                            <div>
                              @if ($user->image)
                                  {{-- <img src="{{ Storage::url('products/' . $user->image) }}" class="img-fluid" width="64PX"> --}}
                                  <img src="{{ Storage::url('products/' . $user->image) }}" class="img-fluid" width="64PX">
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
                            <div class="col-1">{{ $user->id }}</div>
                          </div>
                        </div>
                      </td>



                      {{-- user name --}}
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                        <p class="text-xs text-secondary mb-0">Organization</p>
                      </td>
            
                      {{-- user phone --}}
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $user->phone}}</p>
                      </td>
                      {{-- user adress --}}
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $user->address}}</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">{{ $user->email}}</p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $user->created_at}}</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ $user->updated_at}}</span>

                      </td>
                      <td class="align-middle">
                          <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning text-secondary font-weight-bold text-xs">
                              Edit
                          </a>
                          <a>
                            <form method="POST" action="{{ route('users.delete', $user->id) }}" style="display: inline-block;">
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

      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="" class="font-weight-bold" target="_blank">Shop-KT MANGER</a>
                for a better web.
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>

@endsection