@extends('admin.home')

@section('product_category_edit_content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="my-4">
                                EDIT CATEGORIES
                            </h5>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{-- product_categories.create --}}
                            {{-- <form method="POST" action="{{ route('product_categories.update',$category->id)}}" >
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" rows="3" value="{{ old('description', $category->description) }}" class="form-control"></textarea>
                                    @error('description')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Update Product</button>
                            </form> --}}
                            <form method="POST" action="{{ route('product_categories.update', $category->id) }}">
                                @csrf
                                @method('PUT')
                            
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                                </div>
                            
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $category->description) }}</textarea>
                                </div>
                            
                                <button type="submit" class="btn btn-primary mt-3">Update Category</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
