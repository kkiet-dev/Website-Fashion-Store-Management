@extends('users.home')
@section('contact_content')
<head>

</head>
<div class="container pt-6 mt-6">
    <h1>Liên hệ với chúng tôi</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- <form action="{{ route('contact.send') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Họ và tên</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="message">Tin nhắn</label>
            <textarea id="message" name="message" class="form-control" rows="5">{{ old('message') }}</textarea>
            @error('message')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Gửi</button>
    </form> --}}
    <form action="{{ route('contact.send') }}" method="POST">
        @csrf
    
        <div class="form-group">
            <label for="name">Họ và tên</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="message">Tin nhắn</label>
            <textarea id="message" name="message" class="form-control" rows="5">{{ old('message') }}</textarea required>
            @error('message')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-primary">Gửi</button>
    </form>
    
</div>
@endsection
