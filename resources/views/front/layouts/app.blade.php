<!DOCTYPE html>
<html
    lang="{{ str_replace('_', '-', app()->getLocale()) }}"{!! theme()->printHtmlAttributes('html') !!} {{ theme()->printHtmlClasses('html') }}>
<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Primary Meta Tags -->
    <title>Nefes21 — Kişisel Gelişim Platformu</title>
    <meta name="title" content="Nefes21 ile Yepyeni bir başlangıca hazır mısın?">
    <meta name="description" content="Tamamen sana özel hazırlanmış içerikler, sesli kitaplar, nefes egzersizleri, farkındalık kartları, uyku hikayeleri ve çok daha fazlası seni bekliyor…">
    <meta name="theme-color" content="#4172b8"/>

    @include('front.layouts.meta')
    @include('front.layouts.css')
    @yield('styles')

    @if(env('APP_URL') != "https://nefes21.org.test/")
        @include('front.layouts.tags')
    @endif
{{--    @inject('smartBannerService', 'App\Services\SmartBannerService')

    @if (!$smartBannerService->isBannerShown())
        {!! $smartBannerService->showBanner() !!}
        @php $smartBannerService->markBannerAsShown() @endphp
    @endif--}}

    @yield('first_scripts')

    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @livewireStyles
</head>
<body x-data="{ loginModal: false, registerModal: false }" x-on:keydown.escape="loginModal=false">
    <div id="line_loader"></div>
    <div id="loader">
        <div class="loader">
            <img src="{{ asset('assets/images/logos/loading.gif') }}">
        </div>
    </div>
    <div id="wrapper">
        @if(!Route::is('front.login') && !Route::is('front.register') && !Route::is('front.password.request'))
            @include('front.layouts.aside')
            @include('front.layouts.header')
        @endif
        @yield('content')
        {{--	<x-front.modals.trial-banner/>--}}
        {{--    @livewire('front.login-modal')--}}
        {{--	@livewire('front.register-modal')--}}

    </div>
    <!-- End:: wrapper -->
    <x-front.player/>
    <div id="backdrop"></div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireScripts
</body>
@include('front.layouts.js')
@yield('scripts')
</html>

