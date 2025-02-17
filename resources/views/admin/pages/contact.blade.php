@extends('admin.home')
@section('contact_content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="container mt-4">
                    <h1 class="mb-4">Quản lý Liên hệ</h1>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Tìm kiếm liên hệ -->
                    <form action="{{ route('contacts.show') }}" method="GET" class="form-inline mb-3">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Tìm kiếm..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary mt-3">Tìm kiếm</button>
                    </form>

                    <!-- Thẻ Card hiển thị liên hệ -->
                    <div class="row">
                        @forelse ($contacts as $contact)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $contact->name }}</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">{{ $contact->email }}</h6>
                                        <p class="card-text">{{ Str::limit($contact->message, 100) }}</p>
                                        <p class="card-text"><small class="text-muted">Ngày gửi: {{ $contact->created_at->format('d/m/Y H:i') }}</small></p>
                                        
                                        <!-- Xóa liên hệ -->
                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <div class="alert alert-warning">
                                    Không có liên hệ nào.
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <!-- Phân trang -->
                    <div class="d-flex justify-content-center">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
            
@endsection
