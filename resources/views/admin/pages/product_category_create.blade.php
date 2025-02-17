@extends('admin.home')

@section('product_category_create_content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="text-center my-4">
                                ADD NEW CATEGORIES
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
                            <form action="{{ route('product_categories.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" id="description" rows="3" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Create</button>
                                {{-- <a href="{{ route('product_categories.show_product_category_content') }}" class="btn btn-secondary">Back</a> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
