@extends('front.layouts.app')

@section('content')

    <main id="page_content">
        <div class="hero" style="background-image: url({{ asset('storage/uploads/discover/dimensions/'.$categories[0]->dimension.'.webp') }});"></div>

        <div class="under-hero container">
            <div class="section">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-md-4">
                        <div class="cover cover--round">
                            <div class="cover__image"><img src="{{ asset('storage/uploads/discover/dimensions/'.$categories[0]->dimension.'.webp') }}" alt="{{ $categories[0]->title }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-1 d-none d-xl-block"></div>
                    <div class="col-md-8 mt-5 mt-md-0">
                        <x-front.albums.content-menu :menu="$title[0]"/>
                        <ul class="info-list info-list--dotted mb-3">
                            <li>{{ $categories[0]->categories->count() }} Kategori</li>
                            <li>{{ $total }} içerik</li>
                        </ul>
                        <p class="mb-5">{{ $categories[0]->description }}</p>

                    </div>
                </div>
            </div>
            <div class="section">
                @foreach($categories[0]->categories as $category)<br><br>
                    <div class="section__head mb-0">
                        <h3 class="mb-0"><span class="text-primary">{{ $category->title }}</span></h3>
                    </div>
                    <span class="my-5">{{ $category->description }}</span>

                    <div class="list">
                        <div class="row" data-collection-song-id="1">
                            @foreach($category->layouts as $layouts)
                                @foreach($layouts->contents as $ctn)
                                    <div class="col-xl-6">
                                        <div class="list__item">
                                            <a href="{{ route("front.albums.playlist", $ctn->id) }}" class="list__cover">
                                                <img src="{{ asset($ctn->imgCover) }}" alt="{{ $ctn->title }}" />
                                            </a>
                                            <div class="list__content">
                                                <a href="{{ route("front.albums.playlist", $ctn->id) }}" class="list__title text-truncate">{{ $ctn->title }}</a>
                                                <p class="list__subtitle text-truncate">
                                                    <a href="{{ route("front.author.detail", 1) }}">{{ $ctn->admin }}</a>
                                                </p>
                                            </div>
                                            <ul class="list__option">
                                                <li>{{ $ctn->duration }}</li>
{{--                                                <li><x-front.albums.track-menu /></li>--}}
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
        <x-front.footer.footer :items="[]" />
    </main>
@endsection
