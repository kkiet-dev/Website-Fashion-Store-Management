@extends('admin.home')
@section('user_edit_content')
{{-- <div class="container "> --}}
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ">
                    <div class="p-4">
                        <div class="card-header pb-0">
                            <h6>USERS EDIT</h6>
                        </div>
                        
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
    
                        {{-- <form method="POST" action="{{ route('users.update', $user->id) }}"> --}}
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Product Image</label>
                                <input type="file" id="image" name="image">
                                @if($user->image)
                                    {{-- <img src="{{ Storage::url('products/' . $user->image) }}" class="img-fluid" width="64PX"> --}}
                                    <img src="{{ Storage::url('products/' . $user->image) }}" class="img-fluid" width="64PX">
                                @endif
                            </div>
    
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}" required>
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label>Adress</label>
                                <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}" required>
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label>Password (leave blank to keep current password)</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_id">Role_id</label>
                                <select name="role_id" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected' : '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
    
                            <button type="submit" class="btn btn-primary mt-3">Update User</button>
                        </form>

                    </div>
                 
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}



@endsection
