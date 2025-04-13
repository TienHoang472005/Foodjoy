@extends('client.layouts.app')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">🛒 Giỏ hàng của bạn</h2>

    @if($cart && $cart->items->count())
        <form action="{{ route('cart.update') }}" method="POST">
            @csrf
            <table class="table table-hover table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart->items as $item)
                        @php 
                            $subtotal = $item->product->price * $item->quantity; 
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $item->product->image) }}" width="80" class="rounded shadow-sm">
                            </td>
                            <td>{{ number_format($item->product->price) }}đ</td>
                            <td style="width: 120px;">
                                <input type="number" name="quantities[{{ $item->id }}]" value="{{ $item->quantity }}" min="1" class="form-control text-center">
                            </td>
                            <td>{{ number_format($subtotal) }}đ</td>
                            <td>
                                <a href="{{ route('cart.remove', $item->id) }}" class="btn btn-sm btn-danger">X</a>
                            </td>
                        </tr>
                    @endforeach
                    <tr class="table-secondary">
                        <td colspan="4" class="text-end"><strong>Tổng cộng:</strong></td>
                        <td colspan="2"><strong>{{ number_format($total) }}đ</strong></td>
                    </tr>
                </tbody>
            </table>

            <div class="d-flex justify-content-between mt-3">
                <a href="#" class="btn btn-secondary">⬅ Tiếp tục mua sắm</a>
                <div>
                    <button type="submit" class="btn btn-warning">🔄 Cập nhật giỏ hàng</button>
                    <a href="#" class="btn btn-success">💳 Thanh toán</a>
                </div>
            </div>
        </form>
    @else
        <div class="alert alert-info">🛍 Giỏ hàng của bạn đang trống.</div>
    @endif
</div>
@endsection
