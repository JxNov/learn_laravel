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
        <a href="{{ route('users.addUsers') }}" class="btn btn-primary">Thêm mới</a>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phòng ban</th>
                <th scope="col">Hành động</th>
            </tr>
            </thead>

            <tbody>
            @foreach($listUsers as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->ten_donvi }}</td>
                    <td>
                        <a href="{{ route('users.deleteUser', $user->id) }}" class="btn btn-danger"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                            Xóa
                        </a>

                        <a href="{{ route('users.editUser', $user->id) }}" class="btn btn-primary">Sửa</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
