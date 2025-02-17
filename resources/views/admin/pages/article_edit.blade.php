@extends('admin.home')
@section('article_edit_content')
{{-- <div class="container "> --}}
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ">
                    <div class="p-4">
                        <div class="card-header pb-0">
                            <h5>POSTS EDIT</h5>
                        </div>
                        
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
    
                        {{-- <form method="POST" action="{{ route('products.update', $product->id) }}"> --}}
                        {{-- <form action="{{ route('article.update', $articles->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label>Name product</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $articles->name) }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div data-mdb-input-init class="form-outline">
                                <textarea class="form-control" name="description" id="textAreaExample1" rows="4" value="{{ old('description', $articles->description) }}" required></textarea>
                                <label class="form-label" for="textAreaExample">Description</label>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <button type="submit" class="btn btn-primary mt-3">Update Article</button>
                        </form> --}}
                        <form action="{{ route('article.update', $articles->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Thêm phương thức PUT cho cập nhật -->
                        
                            <div class="form-group">
                                <label>Name product</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $articles->name) }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        
                            <div data-mdb-input-init class="form-outline">
                                <textarea class="form-control" name="description" id="textAreaExample1" rows="4" required>{{ old('description', $articles->description) }}</textarea>
                                <label class="form-label" for="textAreaExample">Description</label>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        
                            <button type="submit" class="btn btn-primary mt-3">Update Post</button>
                        </form>
                        

                    </div>
                 
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}



@endsection
