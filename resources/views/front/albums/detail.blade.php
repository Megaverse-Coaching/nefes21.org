@extends('front.layouts.app')

@section('content')
    <main id="page_content">
        <div class="hero" style="background-image: url({{ asset($content->imgCover) }})"></div>
        <div class="under-hero container">
            <div class="section">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-md-4">
                        <div class="cover cover--round">
                            <div class="cover__image">
                                <img src="{{ asset($content->imgCover) }}" alt="Treasure face">
                            </div>
                        </div>
                    </div>
                    <div class="col-1 d-none d-xl-block"></div>
                    <div class="col-md-8 mt-5 mt-md-0 text-black">
                        <x-front.albums.content-menu :menu="$content" />
                        <ul class="info-list info-list--dotted mb-3">
                            <li>{{ \Carbon\Carbon::parse($content->created_at)->translatedFormat('j F, Y')  }}</li>
                            <li>{{ $tracks->count() }} Bölüm</li>
                            <li>{{ $content->duration }}</li>
                            <li>
                                @switch($content->gender)
                                    @case('General')Kadın & Erkek @break
                                    @case('Female') Kadınlara Özel @break
                                    @case('Male') Erkeklere Özel @break
                                    @default
                                    Herkese Göre
                                @endswitch
                            </li>
                            <li>
                                @switch($content->age)
                                    @case('General') Genel İzleyici @break
                                    @default {{$content->age . ' Yaş Arası' }}
                                @endswitch
                            </li>
                            <li>
                                @foreach($content->type as $type)
                                    @if(!$loop->last)
                                        <a href="#" class="py-2 me-2 text-black">{{ $type }},</a>
                                    @else
                                        <a href="#" class="py-2 me-2 text-black">{{ $type }}</a>
                                    @endif
                                @endforeach
                            </li>
                        </ul>
                        <p class="mb-1">{{ $content->description }}</p>
                        <p class="mb-5">Yazar:
                            <a href="{{ route('front.author.detail', $author->author_id) }}" class="text-dark fw-medium">{{ $author->label }}</a>
                        </p>
{{--                        <x-front.albums.info-icons />--}}
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="list">
                    <div class="row" data-collection-song-id="{{ $content->id }}">
                        @foreach($tracks->split(2) as $chunk)
                            <div class="col-xl-6">
                                @foreach($chunk as $item)
                                    <x-front.albums.trackList :tracks="$item" :author="$author" :content="$content" :loop="$loop" />
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="section__head">
                    <h3 class="mb-0">Yazarın Diğer <span class="text-primary">İçerikleri</span></h3>
                </div>
                <div class="swiper-carousel swiper-carousel-button">
                    <div class="swiper" data-swiper-slides="5" data-swiper-autoplay="true">
                        <div class="swiper-wrapper">
                            @foreach($related as $item)
                                <x-front.albums.related :related="$item" />
                            @endforeach
                        </div>
                    </div>
                    <div class="swiper-button-prev btn-default rounded-pill"></div>
                    <div class="swiper-button-next btn-default rounded-pill"></div>
                </div>
            </div>
        </div>
        <x-front.footer.footer :items="[]"/>
    </main>
@endsection
