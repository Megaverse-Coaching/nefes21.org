@props(['discover'])

<div class="swiper-slide">
    <div class="cover cover--round">
        <div class="cover__image">
            <a href="{{ route('front.discover.detail', $discover['dimension']) }}">
                <img src="{{ asset($discover['image']) }}" alt="{{ $discover['title'] }}" />
            </a>
            <div class="cover__image__content">
                <a href="{{ route('front.discover.detail', $discover['dimension']) }}" class="cover__title mb-1 fs-6 text-truncate">{{ $discover['title'] }}</a>
                <span class="cover__subtitle">10 Songs | 10 Favorites</span>
            </div>
        </div>
    </div>
</div>
