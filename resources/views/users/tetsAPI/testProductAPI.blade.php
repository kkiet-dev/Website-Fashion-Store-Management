.<!DOCTYPE html>
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
    <h1>Danh sách sản phẩm</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>image</th>
                <th>name</th>
                <th>descripton</th>
                <th>price</th>
                <th>quantyti</th>
                <th>category_id</th>
                <th>updated_at</th>
                <th>created_at</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td>{{ $product['image'] }}
                        @if ($product['image'])
                            {{-- <img src="{{ Storage::url('products/' . $product->image) }}" class="img-fluid" width="64PX"> --}}
                            <img src="{{ Storage::url('products/' . $product['image']) }}" class="img-fluid" width="64PX">
                        @else
                            <p>No image available</p>
                        @endif
                    </td>
                    <td>{{ $product['name'] }}</td>
                    <td>{{ $product['description'] }}</td>
                    <td>{{ $product['price'] }}</td>
                    <td>{{ $product['quantity'] }}</td>
                    <td>{{ $product['category_id'] }}</td>
                    <td>{{ $product['created_at'] }}</td>
                    <td>{{ $product['updated_at'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>