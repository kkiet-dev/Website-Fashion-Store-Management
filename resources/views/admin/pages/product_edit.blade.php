@extends('admin.home')
@section('product_edit_content')
{{-- <div class="container "> --}}
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ">
                    <div class="p-4">
                        <div class="card-header pb-0">
                            <h5>PRODUCT EDIT</h5>
                        </div>
                        
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
    
                        {{-- <form method="POST" action="{{ route('products.update', $product->id) }}"> --}}
                        <form action="{{ route('products.update', $products->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label>Name product</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $products->name) }}" required>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            {{-- <div class="form-group">
                                <label for="image">Product Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                                @error('image')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div> --}}

                            <div class="form-group">
                                <label for="image">Product Image</label>
                                <input type="file" id="image" name="image">
                                @if($products->image)
                                    <img src="{{ Storage::url('products/' . $products->image) }}" class="img-fluid" width="64PX">
                                @endif
                            </div>
    
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" value="{{ old('description', $products->description) }}" required>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $products->price) }}" required>
                                @error('price')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" name="quantity" class="form-control" value="{{ old('quantity',$products->quantity) }}" required>
                                @error('quantity')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">Select Category</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
    
                            <button type="submit" class="btn btn-primary mt-3">Update Product</button>
                        </form>

                    </div>
                 
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}



@endsection
