<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        @foreach ($Items as $item)
        <div class="swiper-slide relative">
            <!-- Skeleton Loader -->
            <div class="skeleton h-full w-full absolute inset-0" style="display: block;"></div>

            <!-- Actual Image -->
            <img src="{{ asset($item->item_photo) }}" alt="" class="hidden">
        </div>
        @endforeach
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swiperSlides = document.querySelectorAll('.swiper-slide');

        swiperSlides.forEach((slide) => {
            const img = slide.querySelector('img');
            const skeleton = slide.querySelector('.skeleton');

            // Show skeleton until the image is fully loaded
            img.onload = function() {
                skeleton.style.display = 'none';
                img.classList.remove('hidden');
            };

            // If the image is already cached and loaded
            if (img.complete) {
                skeleton.style.display = 'none';
                img.classList.remove('hidden');
            }
        });
    });
</script>
