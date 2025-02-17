@extends('admin.home')

@section('term_create_content')
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h5>ADD NEW TERM</h5>
                </div>
                <div class="card-body">

                    <form method="POST" action="{{ route('term.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="image">Term Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="description" class="form-control" value="{{ old('description') }}" required>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" value="{{ old('status') }}" required>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div> --}}

                        <button type="submit" class="btn btn-primary mt-3">Add Term</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
