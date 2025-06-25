@if(Auth::guard('web')->check())
    @php
        header("Location: " . URL::to('/'), true, 302);
        exit();
    @endphp
@endif
@extends('front.layouts.app')
@section('styles')
    <style>
        form span.error {
            color: #ffc107;
            font-size: 12px;
            padding-left: 30px;
            font-weight: 100;
            font-family: system-ui;
        }
    </style>
@endsection
@section('content')

    <div id="wrapper">
        <div class="auth py-5">
            <div class="container">
                <div class="row">
                    <div class="col-xl-5 col-lg-7 col-md-9 col-sm-11 mx-auto">
                        <div class="card">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="card-body p-sm-5">
                                <h4><span class="text-primary">Üye Olun</span></h4>
                                <form class="form w-100" id="signUpForm" method="post" action="{{ route("front.register") }}">
                                    @csrf
                                    <div class="mb-3 fv-row">
                                        <label for="first_name" class="form-label fw-medium">Ad</label>
                                        <input name="first_name" type="text" id="first_name" class="form-control" value="{{old('first_name')}}" required>
                                    </div>
                                    <div class="mb-3 fv-row">
                                        <label for="last_name" class="form-label fw-medium">Soyad</label>
                                        <input name="last_name" type="text" id="last_name" class="form-control" value="{{ old('last_name') }}" required>
                                    </div>
                                    <div class="mb-3 fv-row">
                                        <label for="email" class="form-label fw-medium">E-posta</label>
                                        <input name="email" type="email" id="email" class="form-control" autocomplete="none" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="mb-2 fv-row">
                                        <label for="password" class="form-label fw-medium">Parola</label>
                                        <input name="password" type="password" id="password" class="form-control" autocomplete="new-password" required>
                                    </div>
                                    <div class="mb-2 fv-row">
                                        <label for="confirm-password" class="form-label fw-medium">Parolanızı tekrar girin</label>
                                        <input name="password_confirmation" type="password" id="confirm-password" class="form-control" required>
                                    </div>
                                    <div class="mb-4 text-end">
                                        <a href="#" class="link-primary fw-medium">Şifremi Unuttum!</a>
                                    </div>
                                    <div class="mb-5">
                                        <input type="submit" class="btn btn-primary w-100" value="Giriş">
                                    </div>
                                    <p>Henüz kayıtlı değil misiniz?<br>
                                        <a href="{{ route('front.login') }}" id="signUpButton" class="fw-medium external">Giriş Yap</a>
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
