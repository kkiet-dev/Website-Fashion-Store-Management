@extends('admin.home')
@section('term_edit_content')
{{-- <div class="container "> --}}
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ">
                    <div class="p-4">
                        <div class="card-header pb-0">
                            <h5>TERM EDIT</h5>
                        </div>
                        
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
    
                        {{-- <form method="POST" action="{{ route('products.update', $product->id) }}"> --}}
                        <form action="{{ route('term.update', $terms->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label>Name product</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $terms->name) }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Product Image</label>
                                <input type="file" id="image" name="image">
                                @if($terms->image)
                                    <img src="{{ Storage::url('products/' . $terms->image) }}" class="img-fluid" width="64PX">
                                @endif
                            </div>
    
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" value="{{ old('description', $terms->description) }}" required>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <button type="submit" class="btn btn-primary mt-3">Update Term</button>
                        </form>

                    </div>
                 
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}



@endsection
