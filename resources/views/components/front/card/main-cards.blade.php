@props(['cards'])
<div class="card-showcase">
    <a href="{{ route('front.cards.list', $cards['id']) }}">
        <img class="rounded-pill" src="{{ asset($cards['showcase']) }}" alt="">
    </a>
</div>
