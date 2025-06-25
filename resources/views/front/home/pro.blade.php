@extends('front.layouts.app')

@section('styles')
    <style>
        .player-container img {
            height: inherit;
        }

        .swiper-slide {
            max-width: 240px;
        }
    </style>
@endsection
@section('content')
    <main id="page_content">
        <div class="hero" style="background-image: url({{ asset('assets/images/banner/banner6.webp') }});"></div>
        <div class="under-hero container">
            <div class="section">
                <div class="section__head">
                    <div class="flex-grow-1">
                        {{--                        <span class="section__subtitle">Nefes21</span>--}}
                        <h3 class="mb-0">
                            Nefes<span class="text-primary">21 Trendler</span>
                        </h3>
                    </div>
                    {{--                    <a href="#" class="btn btn-link">Tümünü Gör</a>--}}
                </div>
                <div class="swiper-carousel">
                    <div class="swiper" data-swiper-slides="4" data-swiper-autoplay="true">
                        <div class="swiper-wrapper">
                            @foreach($showcase as $item)
                                <x-front.home.today-showcase :showcase="$item" :contents="$item->content"/>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-prev btn-default rounded-pill"></div>
                    <div class="swiper-button-next btn-default rounded-pill"></div>
                </div>
            </div>

            <div class="section">
                <div class="section__head">
                    <div class="flex-grow-1">
                        <span class="section__subtitle">Nefes21'e</span>
                        <h3 class="mb-0">
                            <span class="text-primary">Başlarken</span>
                        </h3>
                    </div>
                    <a href="#" class="btn btn-link">Tümünü Gör</a>
                </div>
                <div class="swiper-carousel swiper-carousel-button">
                    <div class="swiper" data-swiper-slides="5" data-swiper-autoplay="true">
                        <div class="swiper-wrapper">
                            @foreach($todayStarters as $item)
                                <x-front.home.starters :content="$item->content"
                                                       :author="$item->content->admin->authorInfo ?? []"/>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-prev btn-default rounded-pill"></div>
                    <div class="swiper-button-next btn-default rounded-pill"></div>
                </div>
            </div>

            <div class="section">
                <div class="section__head">
                    <div class="flex-grow-1">
                        {{--                        <span class="section__subtitle">Öne Çıkanlar</span>--}}
                        <h3 class="mb-0">
                            Bana <span class="text-primary">Özel </span>
                        </h3>
                    </div>
                    <a href="#" class="btn btn-link">Tümünü Gör</a>
                </div>
                <div class="swiper-carousel swiper-carousel-button">
                    <div class="swiper" data-swiper-slides="5" data-swiper-autoplay="true">
                        <div class="swiper-wrapper">
                            @foreach($todayPool as $item)
                                <x-front.home.top-charts :charts="$item"/>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-prev btn-default rounded-pill"></div>
                    <div class="swiper-button-next btn-default rounded-pill"></div>
                </div>
            </div>

            <div class="section">
                <div class="section__head">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">
                            <span class="text-primary">Keşfet</span>
                        </h3>
                    </div>
                    <a href="{{ route('front.discover.index') }}" class="btn btn-link">Tümünü Gör</a>
                </div>
                <div class="swiper-carousel">
                    <div class="swiper" data-swiper-slides="4" data-swiper-autoplay="true">
                        <div class="swiper-wrapper">
                            @foreach($discover as $item)
                                <x-front.home.discover-categories :discover="$item"/>
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-prev btn-default rounded-pill"></div>
                    <div class="swiper-button-next btn-default rounded-pill"></div>
                </div>
            </div>

            <div class="row d-none">
                <div class="section col-xl-6">
                    <div class="section__head">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">
                                Yaklaşan <span class="text-primary">Etkinlikler</span>
                            </h3>
                        </div>
                        <a href="https://kisiselgelisim.tv/etkinlikler/video-etkinlikler" class="btn btn-link">Tüm
                            Etkinlikler</a>
                    </div>
                    <div class="swiper-carousel">
                        <div class="swiper" data-swiper-slides="2" data-swiper-autoplay="true">
                            <div class="swiper-wrapper">
                                <x-front.home.events :events="[]"/>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-1"></div>
                <div class="section col-xl-5 ">
                    <div class="mat-tabs">
                        <ul class="nav nav-tabs" id="{{ $categories[0]->dimension }}" role="tablist">
                            @foreach($categories[0]->categories as $cat)
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ ($loop->first) ? 'active' : 'passive' }}"
                                            id="{{ $cat->category }}" data-bs-toggle="tab"
                                            data-bs-target="#cat{{ $loop->iteration }}" type="button" role="tab"
                                            aria-controls="{{ $cat->category }}" aria-selected="true">
                                        {{ $cat->title }}
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="tab-content mt-4" id="songs_list_content">
                        @foreach($categories[0]->categories as $categories)
                            <div class="tab-pane fade {{ ($loop->first) ? 'active show' : null }}"
                                 id="cat{{ $loop->iteration }}" role="tabpanel"
                                 aria-labelledby="{{ $categories->category }}" tabindex="0">
                                <div class="list">
                                    @foreach($categories->layouts as $layouts)

                                        @foreach($layouts->contents as $cnt)
                                            <div class="list__item" data-song-id="2" data-song-name="{{ $cnt->title }}"
                                                 data-song-artist="{{ $cnt->title }}"
                                                 data-song-album="{{ $categories->title }}" data-song-url=""
                                                 data-song-cover="{{ $cnt->imgCover }}">
                                                <div class="list__cover">
                                                    <img src="{{ $cnt->imgCover }}" alt="{{ $cnt->title }}"/>
                                                    <a href="{{ route('front.albums.playlist', ["id" => $cnt->id]) }}"
                                                       class="btn btn-play btn-sm btn-default btn-icon rounded-pill"
                                                       data-play-id="2" aria-label="Play pause">
                                                        <i class="ri-play-fill icon-play"></i>
                                                        <i class="ri-pause-fill icon-pause"></i>
                                                    </a>
                                                </div>
                                                <div class="list__content">
                                                    <a href="{{ route('front.albums.playlist', $cnt->id) }}"
                                                       class="list__title text-truncate"> {{ $cnt->title }}</a>
                                                    <p class="list__subtitle text-truncate">
                                                        <a href="{{ route('front.albums.playlist', $cnt->id) }}"> {{ $categories->title }}</a>
                                                    </p>
                                                </div>
                                                <ul class="list__option">
                                                    <li>{{ $cnt->duration }}</li>
                                                    <li>
                                                        <x-front.albums.track-menu/>
                                                    </li>
                                                </ul>
                                            </div>
                                        @endforeach

                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>


            <div class="section">
                <div class="section__head">
                    <div class="flex-grow-1">
                        <span class="section__subtitle">Sizler İçin</span>
                        <h3 class="mb-0">
                            <span class="text-primary">Program</span>
                        </h3>
                    </div>
                    <a href="{{ route('front.programs.index') }}" class="btn btn-link">Tümünü Gör</a>
                </div>
                <div class="swiper-carousel swiper-carousel-button">
                    <div class="swiper" data-swiper-slides="5" data-swiper-autoplay="true">
                        <div class="swiper-wrapper">
                            @foreach($mainPrograms as $program)
                                <x-front.home.programs :programs="$program"/>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>


            <div class="section">
                <div class="section__head">
                    <div class="flex-grow-1">
                        <h3 class="mb-0">
                            <span class="text-primary">Yazarlar</span>
                        </h3>
                    </div>
                    <a href="{{ route('front.author.index') }}" class="btn btn-link">Tümünü Gör</a>
                </div>
                <div class="swiper-carousel swiper-carousel-button">
                    <div class="swiper" data-swiper-slides="6" data-swiper-autoplay="true">
                        <div class="swiper-wrapper">
                            @foreach($authors as $item)
                                <x-front.authors.featured-authors :featured="$item"/>
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
        {{--        {!! $shareComponent !!}--}}
        <x-front.footer.footer :items="[]"/>


    </main>
@endsection
