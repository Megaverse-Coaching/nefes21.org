@extends('front.layouts.app')

@section('styles')
    <style>
        .hero{
            background: url({{ asset($deckDetail[0]['background']) }}) center no-repeat;
            background-size: cover;
            position: relative;
        }
        .under-hero{
            margin-top: 0!important;
        }
    </style>
@endsection

@section('content')
    <main id="page_content">
        <div class="hero"></div>
        <div class="under-hero container">
            <div class="section">
                <div class="row">
                    <div class="page-inner-title text-black">
                        <div class="title"><h4>{{$deckDetail[0]['title']}}</h4></div>
                        <div class="description"><p class="fs-4 fw-semi-bold ">{{ $cardDetail[0]['title'] }}</p></div>
                        <div class="d-flex float-end">
                            <h6 class="pe-2 pt-1">Yazı Boyutu:</h6>
                            <button id="up" class="btn btn-sm btn-outline-secondary  pe-1 me-1">A+</button>
                            <button id="down" class="btn btn-sm btn-outline-secondary pe-1">-A</button>
                        </div>
                    </div>


                    <div class="mt-5 text-black">
                        <div class="title"><h4>Kart Yorumu</h4></div>
                        <div class="content">
                            {!! $cardDetail[0]->description !!}
                        </div>
                    </div>

                </div>
            </div>

            <div class="section">
                <div class="section__head">
                    <h3 class="mb-0">Önerlen <span class="text-primary">İçerikler</span></h3>
                </div>
                <div class="swiper-carousel swiper-carousel-button">
                    <div class="swiper" data-swiper-slides="5" data-swiper-autoplay="true">
                        <div class="swiper-wrapper">
                            @isset($content->admin)
                                <x-front.card.related :related="$content" />
                            @endisset
                        </div>
                    </div>
                    <div class="swiper-button-prev btn-default rounded-pill"></div>
                    <div class="swiper-button-next btn-default rounded-pill"></div>
                </div>
            </div>


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


        {{--            <x-front.card.card-content :showcase="$cardDetail[0]->contentDetail"/>--}}
        <x-front.footer.footer :items="[]" />


    </main>
@endsection
