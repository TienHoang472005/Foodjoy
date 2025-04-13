@extends('client.layouts.app')

@section('content')
<div class="container py-5">
    <div class="row text-center justify-content-center mb-3">
        @foreach ($products as $product)
        <div class="col-md-2 m-2">
            <div class="card border border-0.5 rounded-2 shadow-lg h-100 d-flex flex-column justify-content-between"
                 style="cursor: pointer;">
                <a href="{{ route('client.product-detail', $product->id) }}">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                             class="card-img-top" style="height: 150px; object-fit: cover;">
                    @else
                        <div style="height: 150px;"
                             class="d-flex align-items-center justify-content-center bg-light text-muted">
                            Không có ảnh
                        </div>
                    @endif
                </a>
                <div class="card-body d-flex flex-column">
                    <p class="card-title mb-1" style="min-height: 40px; font-size: 14px; overflow: hidden;">
                        {{ $product->name }}
                    </p>
                    <p class="text-danger fw-bold">
                        {{ number_format($product->price, 0, ',', '.') }} ₫
                    </p>
                    <form action="{{ route('add.to.cart', $product->id) }}" method="GET" class="mt-auto">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-danger btn-sm w-100">
                            🛒 Đặt mua
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
