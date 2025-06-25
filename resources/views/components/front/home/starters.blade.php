@props(['content', 'author'])
<div class="swiper-slide">
    <div class="cover cover--round" data-song-id="{{ $content->id }}" data-song-name="{{ $content->title }}"
         data-song-artist="{{ $author->label ?? '' }}" data-song-album="{{ $content->title }}"
         data-song-url="audio/ringtone-1.mp3" data-song-cover="{{ asset($content->imgCover) }}">
        <div class="cover__head">
            <ul class="cover__label d-flex">
                <li>
                    <span class="badge rounded-pill bg-danger">
                        <i class="ri-heart-fill"></i>
                    </span>
                </li>
            </ul>
        </div>
        <div class="cover__image">
            <img src="{{ asset($content->imgShowcase) }}" alt="I love you mummy"/>
            <a href="{{ route('front.albums.playlist', $content->id) }}"
               class="btn btn-play btn-default btn-icon rounded-pill" data-play-id="4">
                <i class="ri-play-fill icon-play"></i>
                <i class="ri-pause-fill icon-pause"></i>
            </a>
        </div>
        <div class="cover__foot">
            <a href="{{ route('front.albums.playlist', $content->id) }}" class="cover__title text-truncate">{{ $content->title }}</a>
            <p class="cover__subtitle text-truncate">
                <a href="{{ ( isset($content->admin->authorInfo->author_id) ? route('front.author.detail',$content->admin->authorInfo->author_id) : route('front.author.index')) }}">{{ $author->label ?? 'Yazarlar' }}</a>
            </p>
        </div>
    </div>
</div>
