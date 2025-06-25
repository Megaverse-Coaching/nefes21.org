@extends('front.layouts.app')

@section('content')

    <main id="page_content">
        <div class="hero" style="background-image: url({{ asset('assets/images/banner/banner9.webp') }})"></div>
        <div class="under-hero container">
            <div class="section">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-md-4">
                        <div class="cover cover--round">
                            <div class="cover__image"><img src="{{ asset($info->profilePicUrl) }}" alt="Karen Jennings">
                            </div>
                        </div>
                    </div>
                    <div class="col-1 d-none d-xl-block"></div>
                    <div class="col-md-8 mt-5 mt-md-0 text-black">
                        <div class="d-flex flex-wrap mb-2">
                            <span class="text-dark fs-4 fw-semi-bold pe-2">{{ $info->label }}</span>
                        </div>
                        <ul class="info-list info-list--dotted mb-3">
                            <li>{{ $contents->count() }} İçerik</li>
                            <li>{{ $total }} Bölüm</li>
                            <li>{{ $info->title }}</li>
                            @if($info->position)

                            <li>{{ $info->position }}</li>
                            @endif
                        </ul>
                        <p class="mb-5">{{ $info->info }}</p>

                    </div>
                </div>
            </div>

            <div class="section">
                <div class="section__head">
                    <h3 class="mb-0">Yazarın <span class="text-primary">Tüm İçerikleri</span></h3>
                </div>
                <div class="row g-4">
                    @foreach($contents as $item)
                        <x-front.authors.content-lists :contents="$item" />
                    @endforeach
                </div>
            </div>
        </div>
        <x-front.footer.footer :items="[]" />
    </main>
@endsection
