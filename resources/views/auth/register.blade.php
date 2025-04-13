<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký - Foodjoy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('client/css/auth.css') }}">
</head>

<body>
    <div class="glass-box">
        <h2>Đăng ký Foodjoy</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Họ tên:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" placeholder="Nhập họ tên...">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Nhập email...">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu...">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Nhập lại mật khẩu:</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu...">
            </div>
            <button type="submit" class="btn btn-register w-100">Đăng ký</button>
        </form>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}" class="text-light text-decoration-none">Đã có tài khoản? Đăng nhập</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
