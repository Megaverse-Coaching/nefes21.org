@extends('front.layouts.app')

@section('content')

    <main id="page_content">
        <div class="hero" style="background-image: url({{ asset('assets/images/banner/banner6.webp') }});"></div>
        <div class="under-hero container">

            <div class="section">
                <div class="section__head">
                    <h3 class="mb-0">Tüm <span class="text-primary">Yazarlar</span></h3>
                </div>
                <div class="row g-4">
                    @foreach($authors as $author)
                        <x-front.authors.all-authors :authors="$author" />
                    @endforeach
                </div>
            </div>
        </div>

        <x-front.footer.footer :items="[]" />
    </main>
@endsection
