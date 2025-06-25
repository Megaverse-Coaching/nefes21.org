@props(['contents'])
<div class="col-6 col-xl-2 col-md-3 col-sm-4">
    <a href="{{ route('front.albums.playlist', $contents->id) }}" class="cover cover--round">
        <div class="cover__image">
            <img src="{{ asset($contents->imgShowcase) }}" alt="{{ $contents->title }}">
        </div>
        <div class="cover__foot">
            <span class="cover__title text-truncate">{{ $contents->title }}</span>
        </div>
    </a>
</div>
