@extends('client.layouts.app')

@section('title', 'Giới thiệu - Foodjoy')

@section('content')
    {{-- Banner --}}
    <section class="bg-danger text-white text-center py-5" style="background-image: url('{{ asset('client/images/anhnen0.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container">
            <h1 class="display-4 fw-bold">Chào mừng đến với Foodjoy!</h1>
            <p class="lead">Trải nghiệm đặt món ăn nhanh chóng – tươi ngon – tiện lợi</p>
        </div>
    </section>

    {{-- Giới thiệu chung --}}
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="mb-4 text-center">Về chúng tôi</h2>
            <p class="text-center mx-auto" style="max-width: 800px;">
                Foodjoy là nền tảng đặt món ăn trực tuyến, nơi bạn có thể khám phá hàng trăm món ngon từ các nhà hàng uy tín. Chúng tôi mang đến trải nghiệm đặt món dễ dàng, giao hàng nhanh chóng và đảm bảo chất lượng từng bữa ăn.
            </p>
        </div>
    </section>

    {{-- Tính năng nổi bật --}}
    <section class="py-5">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="mb-3 fs-2 text-danger">🍱</div>
                    <h5>Đa dạng món ăn</h5>
                    <p>Phong phú từ món Việt đến món quốc tế, có đủ mọi hương vị bạn yêu thích.</p>
                </div>
                <div class="col-md-4">
                    <div class="mb-3 fs-2 text-danger">🚀</div>
                    <h5>Giao hàng siêu tốc</h5>
                    <p>Chỉ vài cú click, món ăn được giao tận nơi nhanh chóng và an toàn.</p>
                </div>
                <div class="col-md-4">
                    <div class="mb-3 fs-2 text-danger">💬</div>
                    <h5>Hỗ trợ tận tâm</h5>
                    <p>Đội ngũ chăm sóc khách hàng luôn sẵn sàng giúp bạn mọi lúc, mọi nơi.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="bg-danger text-white text-center py-5" style="background-image: url('{{ asset('client/images/anhnen4.jpg') }}'); background-size: cover; background-position: center;">
        <div class="container">
            <h3 class="fw-bold mb-3">Hãy để Foodjoy phục vụ bữa ăn của bạn!</h3>
            <a href="" class="btn btn-light px-4 py-2">Khám phá ngay</a>
        </div>
    </section>
@endsection
