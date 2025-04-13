<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Foodjoy')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Slideshow Component -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

</head>

<body>
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    @include('client.layouts.header') {{-- đúng cú pháp để nhúng header --}}

    <div class="container mt-4">
        @yield('content') {{-- nơi chứa nội dung từng trang --}}
    </div>

    @include('client.layouts.footer') {{-- đúng cú pháp để nhúng footer --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
