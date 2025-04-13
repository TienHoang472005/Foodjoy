<div class="swiper mySwiper" style="width: 100%; height: 300px; margin: auto;">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="{{ asset('client/images/anhnen1.jpg') }}" style="width: 100%; height: 100%; object-fit: cover;" /></div>
        <div class="swiper-slide"><img src="{{ asset('client/images/anhnen2.jpg') }}" style="width: 100%; height: 100%; object-fit: cover;" /></div>
        <div class="swiper-slide"><img src="{{ asset('client/images/anhnen3.jpg') }}" style="width: 100%; height: 100%; object-fit: cover;" /></div>
    </div>

    <!-- Optional: Navigation & Pagination -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script>
    new Swiper(".mySwiper", {
        loop: true,
        autoplay: {
            delay: 3000,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>