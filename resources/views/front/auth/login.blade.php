@if(Auth::guard('web')->check())
    @php
        header("Location: " . URL::to('/'), true, 302);
        exit();
    @endphp
@endif
@extends('front.layouts.app')

@section('styles')
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/css/formValidation.min.css"/>
    <style>
        #logo {
            height: 100px;
            position: fixed;
            top: 10%;
            margin-left: 5%;
        }
    </style>
@endsection

@section('content')
    <div id="wrapper">
        <div class="auth py-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-9 col-sm-11 mx-auto">
                        <img id="logo" src="{{ asset('assets/images/logos/logo1.webp') }}" alt="">
                        <div class="card">
                            <div class="card-body p-sm-5">
                                <h4><span class="text-primary">Giriş Yapın</span></h4>
                                <div class="text-gray-500 fw-semibold fs-6"></div>
                                <form novalidate action="{{ route('front.login') }}" class="mt-5"
                                      id="nefes_sign_in_form">
                                    <div class="mb- fv-row">
                                        <label for="email" class="form-label fw-medium">E-posta adresiniz</label>
                                        <input name="email" type="text" id="email" class="form-control"></div>
                                    <div class="mb-2 fv-row">
                                        <label for="password" class="form-label fw-medium">Parolanız</label>
                                        <input name="password" type="password" id="password" class="form-control"></div>
                                    <div class="mb-4 text-end">
                                        <a href="#" class="link-primary fw-medium">Şifremi Unuttum!</a>
                                    </div>
                                    <div class="mb-5">
                                        <input type="submit" id="nefes_sign_in_submit" class="btn btn-primary w-100"
                                               value="Giriş">
                                    </div>
                                    <p>Henüz kayıtlı değil misiniz?<br>
                                        <a href="{{ route('front.register') }}" class="fw-medium external">Kayıt Ol</a>
                                    </p>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script src="{{ asset('assets/js/sign-in.js') }}"></script>
@endsection
