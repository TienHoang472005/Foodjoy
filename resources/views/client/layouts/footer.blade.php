<footer class="bg-danger text-white pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row">
            {{-- Cột 1: Logo + mô tả --}}
            <div class="col-md-3 mb-4">
                <div class="bg-white p-2 rounded d-inline-block">
                    <img src="{{ asset('client/images/logo_foodjoy.png') }}" alt="Logo" height="60">
                </div>
                <p class="mt-3">FoodJoy chuyên cung cấp thực phẩm nhanh, sạch, tiện lợi đến mọi nhà. Cảm ơn bạn đã tin tưởng!</p>
            </div>

            {{-- Cột 2: Liên kết nhanh --}}
            <div class="col-md-3 mb-4">
                <h5 class="fw-bold mb-3">Liên kết</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white text-decoration-none">Trang chủ</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Giới thiệu</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Sản phẩm</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Bài viết</a></li>
                    <li><a href="#" class="text-white text-decoration-none">Liên hệ</a></li>
                </ul>
            </div>

            {{-- Cột 3: Thông tin liên hệ --}}
            <div class="col-md-3 mb-4">
                <h5 class="fw-bold mb-3">Liên hệ</h5>
                <p><i class="bi bi-geo-alt me-2"></i> Bắc Từ Liêm, Hà Nội</p>
                <p><i class="bi bi-telephone me-2"></i> 032 593 1245</p>
                <p><i class="bi bi-envelope me-2"></i> support@foodjoy.vn</p>
            </div>

            {{-- Cột 4: Mạng xã hội --}}
            <div class="col-md-3 mb-4">
                <h5 class="fw-bold mb-3">Kết nối với chúng tôi</h5>
                <div class="d-flex">
                    <a href="#" class="text-white fs-4 me-3"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white fs-4 me-3"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white fs-4"><i class="bi bi-youtube"></i></a>
                </div>
                <p class="mt-3">Theo dõi để cập nhật khuyến mãi mới nhất!</p>
            </div>
        </div>

        <hr class="border-light">

        <div class="text-center">
            <p class="mb-0">&copy; {{ date('Y') }} FoodJoy. Tất cả quyền được bảo lưu.</p>
        </div>
    </div>
</footer>
