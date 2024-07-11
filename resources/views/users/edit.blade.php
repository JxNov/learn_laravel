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
<div class="container w-25">
    <div class="py-3">
        <form action="{{ route('users.updateUser') }}" method="post">
            @csrf
            {{--            <input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

            <div class="mb-3">
                <label for="name" class="form-label">Tên</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">

                @error('name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">

                @error('email')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phongban" class="form-label">Phòng ban</label>
                <select class="form-select" id="phongban" name="phongban_id">
                    <option selected disabled>Chọn phòng ban</option>
                    @foreach($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->ten_donvi }}</option>
                    @endforeach
                </select>

                @error('phongban_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tuoi" class="form-label">Tuổi</label>
                <input type="number" class="form-control" id="tuoi" name="tuoi" value="{{ old('tuoi') }}">

                @error('tuoi')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="w-100 btn btn-primary">Submit</button>
        </form>
    </div>
</div>
</body>
</html>
