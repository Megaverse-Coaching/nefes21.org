@props(['tracks', 'content', 'author', 'loop'])

<div class="list__item"
     data-song-id="{{ $tracks->id }}"
     data-song-name="{{ $tracks->title }}"
     data-song-artist="{{ $author->label }}"
     data-song-album="{{ $content->title }}"
     data-song-cover="{{ asset($content->imgCover) }}"
     data-song-url="{{ Storage::url('uploads/mp3/'.$tracks->link) }}">
    <div class="list__cover">
        <img src="{{ asset($content->imgCover) }}" alt="{{ $tracks->title }}">
        <a href="javascript:void(0);" class="btn btn-play btn-sm btn-default btn-icon rounded-pill" data-play-id="{{ $loop->iteration }}" aria-label="Play pause">
            <i class="ri-play-fill icon-play"></i>
            <i class="ri-pause-fill icon-pause"></i>
        </a>
    </div>
    <div class="list__content">
{{--        <a href="{{ route('front.albums.play', ['videoID' => $tracks->id]) }}"--}}
        <a href="javascript:void(0);"
           class="list__title text-truncate">{{ $tracks->title }}</a>
        <p class="list__subtitle text-truncate"> Bölüm {{ $tracks->order }} </p>
    </div>
    <ul class="list__option">
        @if($tracks->isFree == 1)
            <li>

            </li>
        @endif
            @php
                $dt = \Carbon\Carbon::createFromFormat("H:i:s", $tracks->duration);
                $totalMin = \Carbon\CarbonInterval::hour($dt->hour)->addMinutes($dt->minute)->addSeconds($dt->second)->totalMinutes;
//                $totalMin = \Carbon\CarbonInterval::hour($dt->hour)->addMinutes($dt->minute)->addSeconds($dt->second)->totalMinutes;
            @endphp
            <li>{{ \Carbon\CarbonInterval::hour($dt->hour)->addMinutes($dt->minute)->addSeconds($dt->second)->cascade()->forHumans(true) }}</li>

        <li class="dropstart d-inline-flex">
{{--          <x-front.albums.track-menu />--}}
        </li>
    </ul>
</div>
