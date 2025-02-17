@extends('admin.home') {{-- Kế thừa layout chính --}}

@section('product_category_content')
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
              <div class="col-md-12">
                <div class="card-header pb-0">
                    <h5 class="my-4">
                        PRODUCT CATEGORIES
                    </h5>
                </div>

                    {{-- Hiển thị thông báo --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{-- Bảng danh sách danh mục --}}
                    <table class="table table-bordered table-striped">
                        <thead >
                            <tr class="table-dark">
                                <th class="text-uppercase text-white text-secondary  text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-white text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                <th class="text-uppercase text-white text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                                <th class="text-uppercase text-white text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                                {{-- <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="align-middle text-center">
                                                <div class="col-1">{{ $loop->iteration }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="align-middle text-center">
                                                <div class="col-1">{{ $category->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex px-3 py-1">
                                            <div class="align-middle text-center">
                                                <p class="text-xs font-weight-bold text-wrap clamp-text">{{ $category->description ?? 'No description available' }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('product_categories.edit', $category->id) }}" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('product_categories.delete', $category->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">No categories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="p-4">
                        {{-- <button type="button" class="btn btn-primary">add</button> --}}
                        <a type="button" href="{{ route('product_categories.create') }}" class="btn btn-primary text-white font-weight-bold text-xs">
                        Add
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
