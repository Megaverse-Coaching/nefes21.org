@props(['categories'])
<div class="col-xl-3 col-sm-6">
    <div class="cover cover--round">
        <a href="{{ route('front.discover.detail', $categories['dimension']) }}" class="cover__image">
            <img src="{{ asset($categories['image']) }}" alt="{{ $categories['dimension'] }}">
            <div class="cover__image__content">
                <span class="cover__title mb-1 fs-6 text-truncate">{{$categories['title']}}</span>
            </div>
        </a>
    </div>
</div>
