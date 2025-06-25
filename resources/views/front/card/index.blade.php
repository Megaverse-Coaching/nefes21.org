@extends('front.layouts.app')
@section('styles')
    <style>
        .under-hero{
            margin-top: 0!important;
        }
    </style>
@endsection
@section('content')
    <main id="page_content">
        <div class="hero" style="background-image: url({{ asset('assets/images/banner/banner8.webp') }});"></div>
        <div class="under-hero container">
            <div class="section">
                <div class="section__head">
                    <h3 class="mb-0">Denge <span class="text-primary">Kartları</span></h3>
                </div>
                <div class="g-4 justify-content-around row">
                    @foreach($mainCards as $key => $val)
                        <div class="col-lg-4 col-xl-4 col-md-4 col-12">
                            <x-front.card.main-cards :cards="$val"/>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <x-front.footer.footer :items="[]"/>
    </main>

@endsection
