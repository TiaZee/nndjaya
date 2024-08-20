<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        @foreach ($Items as $item)
        <div class="swiper-slide">
            <img src="{{asset($item->item_photo)}}" alt="">
        </div>
        @endforeach
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
</div>
