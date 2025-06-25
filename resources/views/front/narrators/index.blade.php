@extends('front.layouts.app')

@section('content')

    <main id="page_content">
        <div class="hero" style="background-image: url({{ asset('assets/images/banner/banner9.webp') }})"></div>
        <div class="under-hero container">

        </div>
        <x-front.footer.footer :items="[]" />
    </main>
@endsection
