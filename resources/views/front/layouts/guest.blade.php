<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"{!! theme()->printHtmlAttributes('html') !!} {{ theme()->printHtmlClasses('html') }}>
<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Primary Meta Tags -->
    <title>Nefes21 — Kişisel Gelişim Platformu</title>
    <meta name="title" content="Nefes21 ile Yepyeni bir başlangıca hazır mısın?">
    <meta name="description" content="Tamamen sana özel hazırlanmış içerikler, sesli kitaplar, nefes egzersizleri, farkındalık kartları, uyku hikayeleri ve çok daha fazlası seni bekliyor…">
    <meta name="theme-color" content="#4172b8"/>
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://nefes21.org/">
    <meta property="og:title" content="Nefes21 ile Yepyeni bir başlangıca hazır mısın?">
    <meta property="og:description" content="Tamamen sana özel hazırlanmış içerikler, sesli kitaplar, nefes egzersizleri, farkındalık kartları, uyku hikayeleri ve çok daha fazlası seni bekliyor…">
    <meta property="og:image" content="https://nefes21.org/big-logo.webp">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://nefes21.org/">
    <meta property="twitter:title" content="Nefes21 ile Yepyeni bir başlangıca hazır mısın?">
    <meta property="twitter:description" content="Tamamen sana özel hazırlanmış içerikler, sesli kitaplar, nefes egzersizleri, farkındalık kartları, uyku hikayeleri ve çok daha fazlası seni bekliyor…">
    <meta property="twitter:image" content="https://nefes21.org/big-logo.webp">

    @include('front.layouts.css')
    @livewireStyles

    @yield('styles')
</head>
<body
    x-data="{
        loginModal: false,
        registerModal: false,
    }" x-on:keydown.escape="loginModal=false">
<div id="line_loader"></div>
<div id="loader">
    <div class="loader">
        <img src="{{ asset('assets/images/logos/loading.gif') }}">
    </div>
</div>
<div id="wrapper">
    @yield('content')

    @livewire('front.login-modal')
    @livewire('front.register-modal')
</div>
<!-- End:: wrapper -->
@livewireScripts

</body>
@include('front.layouts.js')
</html>
