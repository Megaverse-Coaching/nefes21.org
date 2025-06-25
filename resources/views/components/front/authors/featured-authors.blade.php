@props(['featured'])

<div class="swiper-slide">
    <div class="avatar avatar--xxl d-block text-center">
        <div class="avatar__image">
            <a href="{{ route('front.author.detail', $featured->author_id) }}">
                <img src="{{ asset($featured->profilePicUrl) }}" alt="{{ $featured->label }}">
            </a>
        </div>
        <a href="{{ route('front.author.detail', $featured->author_id) }}" class="avatar__title mt-3">{{ $featured->label }}</a>
    </div>
</div>
