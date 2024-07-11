<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css"
          integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<div class="container">
    <div class="py-3">
        <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm mới</a>

        <form action="{{ route('products.search') }}" method="get">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search" name="search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Category</th>
                <th scope="col">Price</th>
                <th scope="col">View</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->view }}</td>
                    <td>
                        <a href="{{ route('products.edit', ['id' => $product->id]) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('products.delete', ['id' => $product->id]) }}" class="btn btn-danger"
                            onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
