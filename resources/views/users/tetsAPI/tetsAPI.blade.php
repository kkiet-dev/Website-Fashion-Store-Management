<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách người dùng</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Danh sách người dùng</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Ảnh</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Vai trò</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['address'] }}</td>
                    <td>
                        {{-- @if ($user['image'])
                            <img src="{{ asset('storage/' . $user['image']) }}" alt="Ảnh" width="50">
                        @else
                            Không có ảnh
                        @endif --}}
                        
                            @if ($user['image'])
                                {{-- <img src="{{ Storage::url('products/' . $user->image) }}" class="img-fluid" width="64PX"> --}}
                                <img src="{{ Storage::url('products/' . $user['image']) }}" class="img-fluid" width="64PX">
                            @else
                                <p>No image available</p>
                            @endif
                    
                    </td>
                    <td>{{ $user['phone'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['role_id'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>