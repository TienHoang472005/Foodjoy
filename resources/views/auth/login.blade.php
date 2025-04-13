<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập - Foodjoy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('client/css/auth.css') }}">
</head>

<body>
    <div class="glass-box position-relative">
        <a href="{{ url('/') }}" class="position-absolute top-0 start-0 m-3 text-decoration-none text-dark fs-4">
            🏠
        </a>
    <div class="glass-box">
        <h2>Đăng nhập</h2>

        @if ($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email...">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu:</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu...">
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-login w-50">Đăng nhập</button>
                <a href="{{ route('register') }}" class="btn btn-register w-50">Đăng ký</a>
            </div>
        </form>

        <div class="text-center mt-3">
            <a href="#" class="text-light text-decoration-none">Quên mật khẩu?</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
