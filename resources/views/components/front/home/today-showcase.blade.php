@props(['contents', 'showcase'])
<div class="swiper-slide">
    <div class="cover cover--round">
        <div class="cover__head">
            <ul class="cover__label d-flex">
                @if($showcase->showcase_id == "featured")
                    <li>
                        <span class="badge rounded-pill bg-danger">
                            <i class="ri-award-fill"></i>
                        </span>
                    </li>
                @endif
                @if($showcase->showcase_id == "monthly_exclusive")
                    <li>
                        <span class="badge rounded-pill bg-primary">
                            <i class="ri-vip-crown-fill"></i>
                        </span>
                    </li>
                @endif
                @if($showcase->showcase_id == "live_stream")
                    <li>
                        <span class="badge rounded-pill bg-secondary">
                            <i class="ri-broadcast-line"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </div>
        <div class="cover__image">
            <img src="{{ $contents?->imgShowcase ? asset($contents->imgShowcase) : asset($showcase->imgShowcase) }}" alt="{{ $contents->title ?? $showcase->showcase->title }}"/>
            <a href="{{ ($showcase->action == 'open_content') ? route('front.albums.playlist', $showcase->content_id) : URL::to($showcase->actionUrl) }}"
               class="btn btn-play btn-default btn-icon rounded-pill {{ ($showcase->action == 'open_url') ? 'external' : '' }}" data-play-id="4">
                <i class="ri-play-fill icon-play"></i>
                <i class="ri-pause-fill icon-pause"></i>
            </a>
        </div>
        <div class="cover__foot">
            <a href="{{ ($showcase->action == 'open_content') ? route('front.albums.playlist', ['id' => $showcase->content_id]) : URL::to($showcase->actionUrl) }}"
               class="cover__title text-truncate">{{ $contents->title ?? $showcase->showcase->title }}</a>
            <p class="cover__subtitle text-truncate">
                {{ $showcase->showcase->title }}
            </p>
        </div>
    </div>
</div>
