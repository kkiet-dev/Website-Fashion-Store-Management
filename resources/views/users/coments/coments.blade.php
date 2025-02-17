{{-- coments product --}}
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <div class="card">
    <div class="card-body">
        <div class="col-12 d-flex">
            <h4 class="col-6 card-title mb-4">Bình luận sản phẩm</h4>
        </div>
        

        <form action="{{ route('comments.store', $products->id) }}" method="POST">
        @csrf
            <div class="mb-3">
                <label for="comment" class="form-label">Nội dung bình luận</label>
                <input type="hidden" name="product_id" value="{{ $products->id }}">
                <textarea class="form-control" name="content" id="comment" rows="3" placeholder="Viết bình luận của bạn..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi bình luận</button>
        </form>

        

        <hr class="my-4">

        <!-- Display Comments -->
        <div class="comments">
        <h5 class="mb-3">Bình luận mới nhất</h5>
        @foreach($comments as $comment)
        <div class="d-flex mb-4">
            <div class="me-3">
            {{-- <img src="{{$comment->user->img}}" class="rounded-circle" alt="User Avatar"> --}}
            @if ($comment->user->image)
                {{-- <img src="{{ Storage::url('products/' . $user->image) }}" class="img-fluid" width="64PX"> --}}
                <img src="{{ Storage::url('products/' . $comment->user->image) }}" class="rounded-circle" alt="User Avatar" width="64PX">
            @else
                <p>No image available</p>
            @endif
            </div>
            <div>
            <h6 class="mb-1">{{$comment->user->name}}</h6>
            <small class="text-muted">Đăng lúc: {{ $comment->created_at->format('H:i d/m/Y') }}</small>
            <p class="mb-0">{{$comment->content}}</p>
            </div>
        </div>
        @endforeach

        {{-- <div class="d-flex mb-4">
            <div class="me-3">
            <img src="https://via.placeholder.com/50" class="rounded-circle" alt="User Avatar">
            </div>
            <div>
            <h6 class="mb-1">Trần Thị B <small class="text-muted">- 1 ngày trước</small></h6>
            <p class="mb-0">Giao hàng nhanh, sản phẩm đúng như mô tả!</p>
            </div>
        </div> --}}
        </div>
    </div>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>