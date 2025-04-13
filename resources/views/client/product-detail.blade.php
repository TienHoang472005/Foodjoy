@extends('client.layouts.app')

@if (session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@section('title', 'Trang chi tiết sản phẩm')

@section('content')

<div class="container mt-5">
    <div class="row">
        {{-- Chi tiết sản phẩm --}}
        <div class="col-md-8">
            <div class="card mb-4 shadow-sm border-light">
                <div class="row g-0">
                    <div class="col-md-5">
                        <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid rounded" style="max-height: 400px; object-fit: cover;" alt="{{ $product->name }}">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <h3 class="card-title">{{ $product->name }}</h3>
                            <h4 class="text-danger mb-3">{{ number_format($product->price) }}đ</h4>
                            <p class="card-text">{{ $product->description }}</p>
                            <p class="card-text"><small class="text-muted">Danh mục: {{ $product->category->name }}</small></p>
                            <a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-success mt-3 px-4 py-2 rounded-pill">Thêm vào giỏ hàng</a>
                            <a href="#" class="btn btn-danger mt-3 px-4 py-2 rounded-pill">Mua ngay</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Sản phẩm liên quan --}}
            <h4 class="mb-3 text-danger text-center">Sản phẩm liên quan</h4>
            <div class="row justify-content-center">
                @foreach ($relatedProducts as $item)
                    <div class="col-md-3 mb-4">
                        <div class="card h-100 shadow-sm border-light rounded">
                            <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->name }}" style="object-fit: cover; height: 200px;">
                            <div class="card-body">
                                <h6 class="card-title text-truncate">{{ $item->name }}</h6>
                                <p class="card-text text-danger">{{ number_format($item->price) }}đ</p>
                                <a href="{{ route('client.product-detail', $item->id) }}" class="btn btn-outline-primary btn-sm">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="col-md-4">
            <h5 class="mb-3 text-danger">Sản phẩm HOT (Xem nhiều nhất)</h5>
            <ul class="list-group">
                @foreach ($topViewedProducts as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('client.product-detail', $item->id) }}" class="text-decoration-none text-truncate" title="{{ $item->name }}">
                                {{ $item->name }}
                            </a>
                        </div>
                        <span class="text-danger small">{{ number_format($item->price) }}đ</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
