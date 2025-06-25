@extends('front.layouts.guest')

@section('styles')
    <style>
        img {
            max-width: 100%;
        }
        #main_header {
            position: relative;
            z-index: 1;
        }
        .landing-hero {
            margin-top: -80px;
            padding-top: 152px;
            background-size: cover;
        }
        p.capture{
            background: #00000038;
            padding: 10px;
            opacity: 1;
            color: whitesmoke;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 500;
            font-family: 'Open Sans', sans-serif;
            letter-spacing: 1px;
        }
        .landing-hero .btn {
            min-width: 160px;
        }
        .landing-hero .container {
            position: relative;
        }

        .landing-border-bottom {
            border-bottom: 2px solid #E4E6EF;
        }

        .subtitle {
            display: block;
            text-transform: uppercase;
            font-weight: 600;
            font-size: 14px;
            letter-spacing: 1px;
        }

        .page-demo {
            transition: transform .25s ease-in-out;
            -webkit-transition: transform .25s ease-in-out;
        }

        .page-demo .page-demo__hero {
            overflow: hidden;
            border-radius: 16px;
            position: relative;
            -webkit-box-shadow: 0 1px 32px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 32px rgba(0, 0, 0, 0.1);
        }

        .page-demo:hover {
            transform: translateY(-8px);
        }

        .landing-feature {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .landing-feature .landing-feature__item {
            background-color: #fff;
            border-radius: 12px;
            border-left: 3px solid transparent;
            -webkit-box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 8px rgba(0, 0, 0, 0.1);
        }

        .landing-feature .landing-feature__head {
            display: block;
            font-weight: 600;
            font-size: 16px;
            line-height: 24px;
            color: #151719;
            padding: 16px 24px;
        }

        .landing-feature .landing-feature__body {
            padding: 0 24px 24px;
            display: none;
        }

        .landing-feature .landing-feature__item.show {
            border-color: #196eed;
        }

        .landing-feature .landing-feature__item.show .landing-feature__body {
            display: block;
        }

        .landing-feature-hero {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .landing-feature-hero li {
            display: none;
        }

        .landing-feature-hero li.show {
            display: block;
        }

        .swiper-pages {
            overflow: visible;
        }

        .swiper-pages img {
            border-radius: 12px;
            -webkit-box-shadow: 0 1px 24px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 24px rgba(0, 0, 0, 0.1);
        }

        .accordion-item {
            border-radius: 16px !important;
            -webkit-box-shadow: 0 1px 16px rgba(0, 0, 0, 0.1);
            box-shadow: 0 1px 16px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .accordion-button {
            border-radius: 16px !important;
            color: #151719;
            font-weight: 600;
            font-size: 16px;
            padding: 1.5rem 2rem;
            line-height: 1.5;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
        }

        .accordion-button:not(.collapsed) {
            background-color: transparent;
            -webkit-box-shadow: none;
            box-shadow: none;
        }

        .accordion-body {
            padding: 0 2rem 2rem;
            font-size: 16px;
            line-height: 1.75;
        }

        #landing_footer {
            padding-top: 100px;
            background-color: #151719;
            text-align: center;
        }

        #landing_footer a {
            display: inline-block;
            color: #a1a4a9;
            text-transform: uppercase;
            margin-top: 8px;
            letter-spacing: 1px;
            position: relative;
        }

        #landing_footer a:after {
            content: '';
            display: block;
            height: 1px;
            background-color: currentColor;
        }

        .footer-title {
            display: block;
            color: #fff;
            font-weight: 600;
            font-size: 20px;
        }

        .last-footer {
            margin-top: 80px;
            padding: 16px 0;
            color: #fff;
            background-color: rgba(255,255,255, 0.05);
        }



        @media (min-width: 480px) {
            .landing-hero {
                padding-top: 160px;
            }
            .landing-hero .fs-6 {
                font-size: 1.25rem !important;
            }
            .page-demo {
                border-radius: 24px;
            }
            .accordion-button {
                font-size: 20px;
            }
        }

        @media (min-width: 1200px) {
            .landing-hero {
                padding-top: 180px;
            }
        }

        @media (min-width: 1400px) {
            .landing-hero .landing-hero__image {
                max-width: 1440px;
            }
        }


    </style>
@endsection

@section('content')
    <header id="main_header">
        <div class="container">
            <nav class="navbar navbar-expand-lg align-items-center">
                <a href="/" class="brand external">
                    <img src="{{ asset('assets/images/logos/logo1.webp') }}" alt="Nefes21"/>
                </a>
                <div class="d-flex align-items-center navbar-ex">
                    @if(Auth::check())
                        <a href="javascript:void(0);" class="avatar header-text" role="button" id="user_menu" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="avatar__image">
                                <img src="{{ asset('assets/images/users/thumb-3.jpg') }}" alt="user" />
                            </div>
                            <span class="ps-2" style="font-size: 14px;color: royalblue;font-weight: 600;">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-md dropdown-menu-end"
                            aria-labelledby="user_menu">
                            <li>
                                <div class="py-2 px-3 avatar avatar--lg">
                                    <div class="avatar__image">
                                        <img src="{{asset('assets/images/users/thumb-3.jpg')}}" alt="user" />
                                    </div>
                                    <div class="avatar__content">
                                        <span class="avatar__title">{{ Auth::user()->name ?? 'Misafir' }}</span>
                                        <span class="avatar__subtitle">Premium Üye</span>
                                    </div>
                                </div>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('front.profile.index') }}">
                                    <i class="ri-user-3-line fs-5"></i>
                                    <span class="ps-2">Profil</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('front.favorites.index') }}">
                                    <i class="ri-heart-line fs-5"></i>
                                    <span class="ps-2">Favoriler</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('front.settings.index') }}">
                                    <i class="ri-settings-line fs-5"></i>
                                    <span class="ps-2">Ayarlar</span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('front.my-plan.index') }}">
                                    <i class="ri-money-dollar-circle-line fs-5"></i>
                                    <span class="ps-2">Plan</span>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li>
                                <a href="{{ route('front.logout') }}" class="dropdown-item d-flex align-items-center external text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ri-logout-circle-line fs-5"></i>
                                    <span class="ps-2">Çıkış</span>
                                </a>
                                <form id="logout-form" action="{{ route('front.logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    @else
                        <button class="btn btn-sm btn-primary btn-outline-dashed me-3" x-on:click="loginModal = true">Giriş Yap</button>
                        <button class="btn btn-sm btn-primary" x-on:click="registerModal = true">Kayıt Ol</button>
                    @endif

                    <button class="navbar-toggler ms-3 ms-sm-4"
                            type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false"aria-label="Toggle navigation">
                        <i class="ri-menu-3-fill"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mt-4 mt-lg-0 mx-auto fw-semi-bold">
                        <li class="nav-item"><a class="nav-link external" href="{{ route('front.home.pro') }}">Keşfet</a></li>
                        <li class="nav-item"><a class="nav-link external" href="about.html">Hakkında</a></li>
                        <li class="nav-item"><a class="nav-link external" href="blog.html">Etkinlikler</a></li>
                        <li class="nav-item"><a class="nav-link" href="#pricing">Fiyat</a></li>
                        <li class="nav-item"><a class="nav-link external" href="contact.html">Bize Ulaşın</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="container-fluid px-xl-4">
        <div class="main-hero mx-auto" style="background-image: url({{ asset('assets/images/background/hero.webp') }});">
            <div class="container">
                <div class="col-xl-6 col-lg-8 col-md-9 fs-5">
                    <h1 class="main-hero__title mb-3"><span class="text-primary">Değişim</span> İçin Cesaret Göster</h1>
                    <div class="me-sm-5">
                        <p class="capture">Değişim yolculuğunda dört hafta boyunca dört farklı zihin işleyişi başlatarak hedeflerine doğru bir yolculuğa çıkacağız. Hadi kendine yeni bir hayalini hediye et!</p>
                        @if(!Auth::check())
                            <a class="btn btn-lg btn-default external" x-on:click="registerModal = true">Üye Ol</a>
                        @endif
                        <a class="btn btn-lg btn-dark external" href="{{ route('front.home.pro') }}">Keşfet</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-section">
        <div class="container">
            <div class="col-xl-6 col-lg-8 mx-auto text-center fs-5 mb-5">
                <h2><span class="text-primary">Nefes21'i</span>  Keşfet</h2>
                <p>Nefes21 bünyesinde barındırdığı zengin yazar kadrosu ile sürekli yeni ve güncel içerikleri sizlere sunar.</p>
            </div>
            <div class="feature">
                <div class="row g-4 g-md-5 justify-content-center">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="card h-100 py-2">
                            <div class="card-body">
                                <div class="feature__icon" style="color: var(--bs-purple);">
                                    <i class="ri-calendar-event-fill fs-4"></i>
                                </div>
                                <h5 class="mt-4 mb-3">Etkinlik &amp; Atölyeler</h5>
                                <p>Nefes21 bünyesinde yapılan bütün etkinlik ve atölyelerden her an her yerde haberdar olun! Telefonunuza sığan iyiliği yakından takip edin!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="card h-100 py-2">
                            <div class="card-body">
                                <div class="feature__icon" style="color: var(--bs-indigo);">
                                    <i class="ri-donut-chart-fill fs-4"></i>
                                </div>
                                <h5 class="mt-4 mb-3">Programlar</h5>
                                <p>Yeni ve daha da güçlü yazar ekibimizle her zaman güncel olan programları kaçırmayın! Huzur bir tık uzağınızda olsun! </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="card h-100 py-2">
                            <div class="card-body">
                                <div class="feature__icon" style="color: var(--bs-red);"><i
                                        class="ri-radio-fill fs-4"></i></div>
                                <h5 class="mt-4 mb-3">Canlı Yayınlar</h5>
                                <p>Bilgiyi gerçekleştiği yerde yakalayın! Canlı yayınlarımıza istediğiniz yerden katılma imkanını kaçırmayın!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="card h-100 py-2">
                            <div class="card-body">
                                <div class="feature__icon" style="color: var(--bs-green);"><i
                                        class="ri-user-4-fill fs-4"></i></div>
                                <h5 class="mt-4 mb-3">Denge Kartları</h5>
                                <p>Evrenin enerjisi sizi nereye çekiyor? Size aslında ne demek istiyor? Bir kart çekin ve öğrenin!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="card h-100 py-2">
                            <div class="card-body">
                                <div class="feature__icon" style="color: var(--bs-blue);">
                                    <i class="ri-music-2-fill fs-4"></i>
                                </div>
                                <h5 class="mt-4 mb-3">Size Özel İçerikler</h5>
                                <p>Duygu durumunuza göre özenle seçilmiş içerikler yalnız size özel olarak sunulur!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="card h-100 py-2">
                            <div class="card-body">
                                <div class="feature__icon" style="color: var(--bs-pink);">
                                    <i class="ri-donut-chart-fill fs-4"></i>
                                </div>
                                <h5 class="mt-4 mb-3">Zengin Kategoriler</h5>
                                <p>10'u aşkın kategoriyle zengin içerikler, siz ve ruhunuz için, aklınıza takılan her şey için Nefes21Pro'da</p>
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="card h-100 py-2">
                            <div class="card-body">
                                <div class="feature__icon" style="color: var(--bs-orange);">
                                    <i class="ri-vip-crown-fill fs-4"></i>
                                </div>
                                <h5 class="mt-4 mb-3">Abonelik Planı</h5>
                                <p>Bütün imkanlardan sınırsız ve sonuna kadar yararlanabilmek için abonelik planlarımızı inceleyin!</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="main-section bg-light">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between text-center mb-5">
                <h2 class="mb-4 mb-sm-0">Yaklaşan <span class="text-primary">Etkinlikler</span></h2>
                <a class="btn btn-outline-primary external" href="https://kisiselgelisim.tv/etkinlikler/video-etkinlikler">Tüm Etkinlikler</a>
            </div>
            <div class="row g-4 g-md-5">
                <div class="col-lg-4 col-sm-6">

                    <div class="cover cover--round">
                        <div class="cover__image">
                            <img src="{{ asset('storage/uploads/events/farkindalik_donusum.webp') }}" alt="Nefes21 Akademi (YENİ) Dönüşüm ve Farkındalık Eğitimi">
                        </div>
                        <div class="cover__foot mt-3 px-2">
                            <span class="cover__title fs-6 mb-3">Nefes21 Akademi (YENİ) Dönüşüm ve Farkındalık Eğitimi</span>
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="#" class="btn btn-sm btn-light-primary">Katıl</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="cover cover--round">
                        <div class="cover__image">
                            <img  src="{{ asset('storage/uploads/events/selma_kahraman_mindfullness-secret-self.webp') }}" alt="Mindfullness &amp; Secret Self">
                        </div>
                        <div class="cover__foot mt-3 px-2">
                            <p class="cover__subtitle d-flex mb-2">
                                <i class="ri-map-pin-fill fs-6"></i>
                                <span class="ms-1 fw-semi-bold">15 Şubat 2023 / 20:30 - 23:30</span>
                            </p>
                            <span class="cover__title fs-6 mb-3">Mindfullness &amp; Secret Self</span>
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="https://www.kisiselgelisim.tv/etkinlikler/video-etkinlikler/secret-self-gizli-benler-oz-guven-calismasi" target="_blank"  class="btn btn-sm btn-light-primary">Katıl</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="cover cover--round">
                        <div class="cover__image">
                            <img src="{{ asset('storage/uploads/events/mucize-sifa-teknikleri-atolyesi-2023-03-14-640.jpg') }}" alt="Mucize Şifa Teknikleri Atölyesi">
                        </div>
                        <div class="cover__foot mt-3 px-2">
                            <p class="cover__subtitle d-flex mb-2">
                                <i class="ri-map-pin-fill fs-6"></i>
                                <span class="ms-1 fw-semi-bold">19 Mart 2023</span>
                            </p>
                            <span class="cover__title fs-6 mb-3">Mucize Şifa Teknikleri Atölyesi</span>
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="https://www.kisiselgelisim.tv/etkinlikler/video-etkinlikler/mucize-sifa-teknikleri-atolyesi" target="_blank" class="btn btn-sm btn-light-primary">Katıl</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="pricing" class="main-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2>Dengeli <span class="text-primary">Plan</span></h2>
            </div>
            <div class="col-xl-11 col-lg-8 mx-auto pt-4">
                <div class="plan bg-light">
                    <div class="card plan__info overflow-hidden">
                        <div class="card-body d-flex flex-column p-0">
                            <div class="p-4">
                                <h4 class="mb-3">Ücretsiz <span class="text-primary">Dene</span></h4>
                                <p class="fs-6">Nefes21'i denemek için ücret ödemek zorunda değilsiniz!</p>
                                <a class="d-inline-flex align-items-center" x-on:click="registerModal = true">
                                    <span class="me-1">Ücretsiz Kayıt Ol</span>
                                    <i class="ri-arrow-right-line fs-6"></i>
                                </a>
                            </div>
                            <div class="px-3 text-center mt-auto">
                                <img src="{{ asset('assets/images/misc/plan.webp') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="plan__data">
                        <div class="card plan__col">

                            <div class="card-body fw-medium">
                                <div class="d-flex align-items-center text-dark mb-4"><i
                                    <i class="ri-music-2-line fs-3"></i>
                                    <h4 class="mb-0 ps-3">Aylık</h4>
                                </div>
                                <p class="fs-6 opacity-50">Neler var?</p>
                                <div class="d-flex mb-3">
                                    <i class="ri-checkbox-circle-fill text-primary opacity-75 fs-6"></i>
                                    <span class="ps-2">Tüm premium içeriklere erişim</span>
                                </div>
                                <div class="d-flex mb-3">
                                    <i class="ri-checkbox-circle-fill text-primary opacity-75 fs-6"></i>
                                    <span class="ps-2">Uygulamanın tüm özelliklerine erişim</span>
                                </div>
                                <div class="d-flex mb-3">
                                    <i class="ri-checkbox-circle-fill text-primary opacity-75 fs-6"></i>
                                    <span class="ps-2">Kesintisiz, reklamsız dinleme</span>
                                </div>
                                <div class="d-flex mb-3">
                                    <i class="ri-checkbox-circle-fill text-primary opacity-75 fs-6"></i>
                                    <span class="ps-2">Oynatma listesi oluşturmak</span>
                                </div>
                            </div>
                            <div class="card-footer pb-4 pb-sm-0">
                                <div class="text-dark mb-3"><span class="fs-4 fw-bold">₺299.00</span>/aylık</div>
                                <button type="button" class="btn btn-primary w-100">Seç</button>
                            </div>
                        </div>
                        <div class="card plan__col">
                            <div class="card-body fw-medium">
                                <div class="d-flex align-items-center text-dark mb-4"><i
                                        class="ri-vip-crown-line fs-3"></i>
                                    <h4 class="mb-0 ps-3">Yıllık</h4>
                                </div>
                                <p class="fs-6 opacity-50">Neler var?</p>
                                <div class="d-flex mb-3">
                                    <i class="ri-checkbox-circle-fill text-primary opacity-75 fs-6"></i>
                                    <span class="ps-2">Tüm premium içeriklere erişim</span>
                                </div>
                                <div class="d-flex mb-3">
                                    <i class="ri-checkbox-circle-fill text-primary opacity-75 fs-6"></i>
                                    <span class="ps-2">Uygulamanın tüm özelliklerine erişim</span>
                                </div>
                                <div class="d-flex mb-3">
                                    <i class="ri-checkbox-circle-fill text-primary opacity-75 fs-6"></i>
                                    <span class="ps-2">Kesintisiz, reklamsız dinleme</span>
                                </div>
                                <div class="d-flex mb-3">
                                    <i class="ri-checkbox-circle-fill text-primary opacity-75 fs-6"></i>
                                    <span class="ps-2">Oynatma listesi oluşturmak</span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-dark mb-3"><span class="fs-4 fw-bold">₺2.499,00</span>/yıllık </div>
                                <button type="button" class="btn btn-primary w-100">Seç</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-section bg-light">
        <div class="container">
            <div class="col-xl-6 col-lg-8 mx-auto text-center fs-5 mb-5">
                <h2><span class="text-primary">Yazarlar</span></h2>
                <p>Nefes21 geniş yazar kadrosu ile zengin içerikleri sizlerle buluşturmaya devam ediyor!</p>
            </div>
            <div class="swiper-carousel swiper-carousel-button">
                <div class="swiper" data-swiper-slides="6" data-swiper-autoplay="true">
                    <div class="swiper-wrapper">
                        @foreach($authors as $item)
                            <x-front.authors.featured-authors :featured="$item"/>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-section">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between text-center mb-5">
                <h2 class="mb-4 mb-sm-0">Denge <span class="text-primary">Programları</span></h2>
                <a class="btn btn-outline-primary external" href="{{ route('front.programs.index') }}">Tüm Programlar</a>
            </div>
            <div class="row g-4 g-md-5">
                <div class="swiper-carousel swiper-carousel-button">
                    <div class="swiper" data-swiper-slides="5" data-swiper-autoplay="true">
                        <div class="swiper-wrapper">
                            @foreach($mainPrograms as $program)
                                <x-front.home.programs :programs="$program" />
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="newsletter text-white">
            <div class="col-xl-7 col-lg-10 fs-5 mx-auto text-center">
                <h2 class="text-white"><span class="newsletter__title-text">Nefes21'i</span> Ücretsiz Deneyin!</h2>
                <p>Nefes21'i denemek için ücret ödemek zorunda değilsiniz! Aşağıdaki butona tıklayarak ücretsiz kayıt olabilirsiniz.</p>
                <a x-on:click="registerModal = true" class="btn btn-lg btn-default external mt-3">Hemen Kayıt Ol</a>
            </div>
        </div>
    </div>
    <footer id="main_footer">
        <div class="container">
            <div class="col-xl-6 col-lg-8 col-md-10 mx-auto text-center">
                <h3 class="mb-5"><span class="text-primary">Binlerce</span> içeriğe her zaman, her yerden sorunsuzca erişin!</h3>
            </div>
            <div class="last-footer py-4">
                <span class="text-black">&copy; {{ date('Y') }} {{ env('APP_NAME') }}. All rights reserved.</span>
                <ul class="social">
                    <li><a href="#"><i class="ri-facebook-fill fs-6"></i></a></li>
                    <li><a href="#"><i class="ri-twitter-fill fs-6"></i></a></li>
                    <li><a href="#"><i class="ri-instagram-fill fs-6"></i></a></li>
                    <li><a href="#"><i class="ri-pinterest-fill fs-6"></i></a></li>
                    <li><a href="#"><i class="ri-youtube-fill fs-6"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>
@endsection
