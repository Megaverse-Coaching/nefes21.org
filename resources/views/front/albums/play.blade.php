@extends('front.layouts.app')

@section('styles')
    <link href="https://vjs.zencdn.net/7.20.3/video-js.css" rel="stylesheet" />
@endsection

@section('content')
    <main id="page_content">
        <div class="hero" style="background-image: url({{ asset('assets/images/banner/banner2.webp') }})"></div>
        <div class="under-hero container">

            <div class="row">
                <iframe id="video" width="200" height="200" src="{{ $videoLink }}" frameborder="0" allowfullscreen></iframe>
            </div>

{{--            <div class="section">--}}
{{--                <div class="list">--}}
{{--                    <div class="row" data-collection-song-id="1">--}}
{{--                        @foreach($tracks as $item)--}}
{{--                            <div class="col-xl-6">--}}
{{--                                <x-front.albums.trackList :tracks="$item" :author="$author" :content="$content[0]" :loop="$loop" />--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            --}}
        </div>
        <x-front.footer.footer :items="[]" />

    </main>
@endsection

@section('scripts')
    <script src="https://vjs.zencdn.net/7.20.3/video.min.js"></script>
@endsection
