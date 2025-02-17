@extends('admin.home')

@section('article_create_content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>ADD NEW POSTS</h5>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    
                        <div data-mdb-input-init class="form-outline">
                            <textarea class="form-control" name="description" id="textAreaExample1" rows="4" required>{{ old('description') }}</textarea>
                            <label class="form-label" for="textAreaExample">Description</label>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    
                        <button type="submit" class="btn btn-primary mt-3">Add Post</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
