@extends('front.layouts.app')
@section('styles')
    <style>
        .site-main::before {
            content: '';
            background: url({{ asset($cardDetail[0]['background']) }});
            position: absolute;
            height: 100%;
            width: 100%;
            opacity: 0.1;
        }
    </style>
@endsection

@section('content')
    <main id="page_content">
        <div class="hero" style="background-image: url({{ asset($cardDetail[0]['background']) }})"></div>
        <div class="under-hero container">
            <div class="section">
                <div id="coverflow" class="mt-150">
                    <ul class="flip-items">
                        @foreach($cards as $item)
                            <x-front.card.card-list :cards="$item" :detail="$cardDetail"/>
                        @endforeach
                    </ul>
                </div>
                <div class="row">
                    <div class="col-12 justify-content-center text-center">
                        <a href="{{ route('front.cards.list', ['id' => $cardDetail[0]['id']]) }}" class="btn btn-hover iq-button btn-default">Kartları Karıştır</a>
                    </div>
                </div>
            </div>
        </div>
        <x-front.footer.footer :items="[]"/>
    </main>
@endsection

