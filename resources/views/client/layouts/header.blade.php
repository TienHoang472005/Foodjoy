<nav class="navbar navbar-expand-lg bg-white border-bottom py-3 shadow-sm sticky-top">
    <div class="container d-flex align-items-center justify-content-between">

        {{-- Logo --}}
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('client/images/logo_foodjoy.png') }}" alt="Logo" height="100">
        </a>

        {{-- Danh mục --}}
        <ul class="navbar-nav mx-4 d-flex align-items-center">
            <li class="nav-item"><a class="nav-link fw-bold" href="{{ url('/') }}">Trang chủ</a></li>
            <li class="nav-item"><a class="nav-link fw-bold" href="{{ route('client.about') }}">Giới thiệu</a></li>

            {{-- Dropdown Sản phẩm --}}
            <li class="nav-item dropdown position-relative">
                <a class="nav-link fw-bold dropdown-toggle" href="{{ route('client.all_products') }}"
                   id="productDropdown" role="button">
                    Sản phẩm
                </a>
                <ul class="dropdown-menu mt-2 shadow-sm bg-white rounded border"
                    aria-labelledby="productDropdown" style="top: 100%; left: 0;">
                    @foreach ($categories as $category)
                        <li>
                            <a class="dropdown-item text-dark"
                               href="{{ route('client.category', $category->id) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="nav-item"><a class="nav-link fw-bold" href="#">Bài viết</a></li>
            <li class="nav-item"><a class="nav-link fw-bold" href="#">Liên hệ</a></li>
        </ul>

        <div class="d-flex align-items-center gap-3">
            <form method="GET" class="d-flex align-items-center">
                <input type="text" name="search" class="form-control form-control-sm" placeholder="Tìm kiếm..."
                    style="width: 200px;" value="{{ request('search') }}">
                <button type="submit" class="btn btn-sm btn-outline-secondary ms-2">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            @if(Auth::check())
                <a href="/cart" class="text-dark position-relative" title="Giỏ hàng">
                    <i class="bi bi-cart3 fs-5"></i>
                </a>
                <form action="/logout" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-danger btn-sm d-flex align-items-center">
                        <i class="bi bi-box-arrow-right me-1"></i> Đăng xuất
                    </button>
                </form>
            @endif

            @guest
                <a href="/login" class="btn btn-outline-danger btn-sm d-flex align-items-center">
                    <i class="bi bi-person me-1"></i> Đăng nhập
                </a>
            @endguest
        </div>
    </div>
</nav>

{{-- Hover dropdown bằng CSS --}}
<style>
 .nav-item.dropdown .dropdown-menu {
        display: none;
        position: absolute;
    }

    /* Đảm bảo không bị out khỏi dropdown */
    .dropdown-menu {
        min-width: 200px;
    }

    .dropdown-menu a:hover {
        background-color: #f8f9fa;
    }
</style>
<script>
    const dropdown = document.querySelector('.nav-item.dropdown');
    let timeout;

    dropdown.addEventListener('mouseenter', () => {
        clearTimeout(timeout);
        dropdown.querySelector('.dropdown-menu').style.display = 'block';
    });

    dropdown.addEventListener('mouseleave', () => {
        timeout = setTimeout(() => {
            dropdown.querySelector('.dropdown-menu').style.display = 'none';
        }, 200); // 200ms để người dùng di chuyển chuột
    });
</script>

