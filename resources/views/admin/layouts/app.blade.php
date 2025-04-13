<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang quản trị - @yield('title', 'Trang quản trị')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    {{-- Font Awesome Icons --}}
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('client/css/home.css') }}">

    <style>
       
    </style>
</head>

<body>

    {{-- Header --}}
    <header class="admin-header d-flex justify-content-between align-items-center px-4 py-2 shadow-sm">
        <!-- Logo -->
        <div class="d-flex align-items-center gap-2">
            <img src="admin/images/logo_foodjoy.png" alt="Logo" height="100">
        </div>

        <!-- Admin Info -->
        <div class="d-flex align-items-center gap-3">
            <span class="text-white">Xin chào, <strong>{{ Auth::user()->name }}</strong></span>
            <img src="admin/images/cho2.jpg" alt="Avatar" class="rounded-circle" width="36"
                height="36">
        </div>
    </header>


    <div class="admin-wrapper">
        {{-- Sidebar --}}
        <nav class="sidebar">
        
            <a href="{{ route('products.index') }}" class="{{ request()->routeIs('products.*') ? 'active' : '' }}">
                <i class="fas fa-box me-2"></i> Quản lý sản phẩm
            </a>
        
            <a href="{{ route('categories.index') }}" class="{{ request()->routeIs('categories.*') ? 'active' : '' }}">
                <i class="fas fa-tags me-2"></i> Quản lý danh mục
            </a>
        
            <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">
                <i class="fas fa-users me-2"></i> Quản lý người dùng
            </a>
        
            <a href="#" class="{{ request()->routeIs('orders.*') ? 'active' : '' }}">
                <i class="fas fa-shopping-cart me-2"></i> Quản lý đơn hàng
            </a>
        
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt me-2"></i> Đăng xuất
            </a>
        
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </nav>

        {{-- Main Content --}}
        <main class="content">
            @yield('content')
        </main>
    </div>

    {{-- Footer --}}
    <footer>
        &copy; {{ date('Y') }} Trang quản trị của Foodjoy - Tiến Hoàng
    </footer>

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
