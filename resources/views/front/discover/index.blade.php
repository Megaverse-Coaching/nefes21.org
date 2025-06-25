@extends('front.layouts.app')

@section('content')

    <main id="page_content">
        <div class="hero" style="background-image: url({{ asset('assets/images/banner/banner2.webp') }});"></div>
        <div class="under-hero container">
            <div class="section">
                <div class="section__head">
                    <h3 class="mb-0">Kategoriler<span class="text-primary"></span></h3>
                </div>
                <div class="row g-4">
                    @foreach($categories as $item)
                        <x-front.discover.categories :categories="$item"/>
                    @endforeach
                </div>
            </div>

        </div>
        <x-front.footer.footer :items="[]"/>
    </main>
@endsection
