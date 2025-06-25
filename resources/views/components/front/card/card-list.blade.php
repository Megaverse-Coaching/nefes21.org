@props(['cards', 'detail'])

<li data-flip-title="{{ $cards['title'] }}" data-flip-category="{{ $cards['card_id'] }}">
    <div class="scene scene--card">
        <div class="card-flipster">
            <div class="card__face card__face--front">
                <img src="{{ asset($detail[0]['back']) }}" height="200" alt="{{ $cards['title'] }}">
            </div>
            <div class="card__face card__face--back">
                <img src="{{ asset($detail[0]['front']) }}" height="200" alt="{{ $cards['title'] }}">
                <div class="card-back-inner">
                    <p style="color:{{$detail[0]['color']}}">{{ $cards['title'] }}</p>
                    <a href="{{route('front.cards.detail', $cards['id'])}}" style="background: {{$detail[0]['color']}}">Kartı Yorumla</a>
                </div>
            </div>
        </div>
    </div>
</li>
