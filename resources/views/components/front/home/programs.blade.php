@props(['programs'])

<div class="swiper-slide">
    <div class="cover cover--round" data-song-id="{{ $programs->program_id }}" data-song-name="{{ $programs->title }}"
         data-song-artist="{{ $programs->title }}" data-song-album="{{ $programs->title }}"
         data-song-url="{{ $programs->title }}" data-song-cover="images/cover/small/1.jpg">
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
            <img src="{{ asset($programs->bgImageUrl) }}" alt="{{ Str::slug($programs->title) }}"/>
            <button type="button" class="btn btn-play btn-default btn-icon rounded-pill" data-play-id="{{ $programs->program_id }}">
                <i class="ri-play-fill icon-play"></i>
                <i class="ri-pause-fill icon-pause"></i>
            </button>
        </div>
        <div class="cover__foot">
            <a href="javascript:void(0);" role="button" class="cover__title text-truncate">{{ $programs->title }}</a>
        </div>
    </div>
</div>
