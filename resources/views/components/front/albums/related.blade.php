@props(['related'])

<div class="swiper-slide">
    <div class="cover cover--round">
        <div class="cover__head">
            <ul class="cover__label d-flex">
                @if($related->isNew == 1)<li><span class="badge rounded-pill bg-primary"><i class="ri-medal-2-line"></i></span></li>@endif
                @if($related->isFree == 0)<li><span class="badge rounded-pill bg-success"><i class="ri-award-line"></i></span></li>@endif
                @if($related->isFree == 1)<li><span class="badge rounded-pill bg-danger"><i class="ri-lock-line"></i></span></li>@endif
            </ul>
            <div class="cover__options dropstart d-inline-flex ms-auto">
                <a class="dropdown-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-label="Cover options" aria-expanded="false">
                    <i class="ri-more-2-fill"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-sm">
                    <li><a class="dropdown-item" href="{{ route('front.author.detail', $related->admin->authorInfo->author_id) }}" role="button" data-favorite-id="100">Yazar Profil</a></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" role="button">Paylaş</a></li>
                    <li class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="javascript:void(0);" role="button" data-favorite-id="100">Favorilere Ekle</a></li>
                    <li><a class="dropdown-item" href="{{ route('front.albums.playlist', $related->id) }}">Detaya Git</a></li>
                </ul>
            </div>
        </div>
        <a href="{{ route('front.albums.playlist', $related->id)}}" class="cover__image">
            <img src="{{ asset($related->imgShowcase) }}" alt="{{$related->title}}">
        </a>
        <div class="cover__foot">
            <a href="{{ route('front.albums.playlist', $related->id) }}" class="cover__title text-truncate">{{$related->title}}</a>
            <p class="cover__subtitle text-truncate">
                <a href="{{ route('front.author.detail', $related->admin->authorInfo->author_id) }}"> {{ $related->admin->authorInfo->label }}</a>
            </p>
        </div>
    </div>
</div>
