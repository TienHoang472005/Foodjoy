<style>
    .card:hover {
        box-shadow: 6px 6px 15px #bbb, -6px -6px 15px #fff;
        transform: translateY(-4px);
    }
</style>

{{-- CÁC DANH MỤC --}}
<div class="container py-4">
    <h4 class="text-dark fw-bold text-center mb-4">DANH MỤC</h4>
    <div class="row justify-content-center">
        @foreach ($categories as $cate)
            <div class="col-md-3 mb-3">
                <div class="card border rounded shadow-sm p-3 text-center">
                    <h6>{{ $cate->name }}</h6>
                    <p>Số sản phẩm: {{ $cate->product->count() }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="container py-3">
    <form action="{{ request()->url() }}" method="GET" class="row justify-content-center align-items-center">
        <div class="col-md-3 mb-2">
            <select name="price_range" class="form-select">
                <option value="">-- Lọc theo giá --</option>
                <option value="1" {{ request('price_range') == '1' ? 'selected' : '' }}>Dưới 20.000₫</option>
                <option value="2" {{ request('price_range') == '2' ? 'selected' : '' }}>50.000₫ - 100.000₫</option>
                <option value="3" {{ request('price_range') == '3' ? 'selected' : '' }}>100.000₫ - 200.000₫
                </option>
                <option value="4" {{ request('price_range') == '4' ? 'selected' : '' }}>Trên 200.000₫</option>
            </select>
        </div>
        <div class="col-md-2 mb-2">
            <button type="submit" class="btn btn-outline-danger w-100">Lọc</button>
        </div>
    </form>
</div>
<div class="container py-5">
    <h5 class="fw-bold text-danger text-center">CÁC SẢN PHẨM PHẨM CỦA FOODJOY</h5>
    <div class="row text-center justify-content-center mb-3">
        @foreach ($products as $product)
            <div class="col-md-2 m-2">
                <div class="card border border-0.5 rounded-2 shadow-lg h-100 d-flex flex-column justify-content-between"
                    style="cursor: pointer;">
                    <a href="{{ route('client.product-detail', $product->id) }}">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->image }}"
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
<div class="text-center my-4">
    <a href="{{ route('client.all_products') }}" class="btn border border-danger text-danger fw-semibold rounded-pill px-4 py-2">
        Xem các sản phẩm khác siêu cuốn <i class="bi bi-caret-down-fill"></i>
    </a>
</div>


<div class="col-md-12 py-4">
    <h5 class="fw-bold text-warning text-center">SẢN PHẨM MỚI RA MẮT</h5>
    <div class="row justify-content-center text-center">
        @foreach ($latestProducts as $product)
            <div class="col-md-2 m-2">
                <div class="card border border-0.5 rounded-2 shadow-lg h-100 d-flex flex-column justify-content-between"
                    style="cursor: pointer;">
                    <a href="{{ route('client.product-detail', $product->id) }}">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->image }}"
                                class="card-img-top" style="height: 150px; object-fit: cover;">
                        @else
                            <div style="height: 150px;" class="d-flex align-items-center justify-content-center bg-light text-muted">
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

