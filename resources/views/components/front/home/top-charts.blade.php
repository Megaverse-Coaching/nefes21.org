@props(['charts'])
<div class="swiper-slide">
    <div class="cover cover--round"
         data-song-id="{{ $charts->id }}" data-song-name="{{ $charts->content[0]->title }}"
         data-song-artist="{{ route('front.albums.playlist', $charts->content[0]->title) }}"
         data-song-album="{{ route('front.albums.playlist', $charts->content[0]->title) }}"
         data-song-url="{{ route('front.albums.playlist', $charts->content[0]->id) }}"
         data-song-cover="{{ asset($charts->content[0]->imgCover) }}">
        <div class="cover__head">
            <ul class="cover__label d-flex">
{{--                <li>--}}
{{--                    <span class="badge rounded-pill bg-danger">--}}
{{--                        <i class="ri-heart-fill"></i>--}}
{{--                    </span>--}}
{{--                </li>--}}
                @if($charts->content[0]->isFree)
                    <li>
                    <span class="badge rounded-pill bg-success">
                        <i class="ri-vip-crown-fill"></i>
                    </span>
                    </li>
                @endif
                @if($charts->content[0]->isNew)
                    <li>
                    <span class="badge rounded-pill bg-info">
                        <i class="ri-shield-star-line"></i>
                    </span>
                    </li>
                @endif
            </ul>

            <div class="cover__options dropstart d-inline-flex ms-auto">
                <a class="dropdown-link" href="javascript:void(0);" role="button"
                   data-bs-toggle="dropdown" aria-label="Cover options"
                   aria-expanded="false"><i class="ri-more-2-fill"></i>
                </a>
{{--                <ul class="dropdown-menu dropdown-menu-sm">--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="javascript:void(0);" role="button" data-favorite-id="4">Favorilere Ekle</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="javascript:void(0);" role="button" data-playlist-id="4">Çalma Listesine Ekle</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="javascript:void(0);" role="button" data-queue-id="4">Sıraya Ekle</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="javascript:void(0);" role="button" data-next-id="4">Sonraki Parça</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="javascript:void(0);" role="button">Paylaş</a>--}}
{{--                    </li>--}}
{{--                    <li class="dropdown-divider"></li>--}}
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="javascript:void(0);" role="button" data-play-id="4">Oynat</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
            </div>

        </div>
        <div class="cover__image">
            <img src="{{ asset($charts->content[0]->imgShowcase) }}" alt="{{ $charts->content[0]->title }}"/>
{{--            {{route('front.albums.playlist', $charts->content[0]->id) }}--}}
            <a href="{{ route('front.albums.playlist', $charts->content[0]->id) }}"
               class="btn btn-play btn-default btn-icon rounded-pill" data-play-id="4">
                <i class="ri-play-fill icon-play"></i>
                <i class="ri-pause-fill icon-pause"></i>
            </a>
        </div>
        <div class="cover__foot">
            <a href="{{ route('front.albums.playlist', $charts->content[0]->id) }}" class="cover__title text-truncate">{{ $charts->content[0]->title }}</a>
            <p class="cover__subtitle text-truncate">
{{--                @foreach($charts->content[0]->type as $type)--}}
{{--                    @if(!$loop->last)--}}
{{--                        <a href="#">{{ $type }},</a>--}}
{{--                    @else--}}
{{--                        <a href="#">{{ $type }}</a>--}}
{{--                    @endif--}}
{{--                @endforeach--}}
                {{ $charts->content[0]->admin }}
            </p>
        </div>
    </div>
</div>
