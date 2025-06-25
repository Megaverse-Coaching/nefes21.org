<x-auth-layout>
    @if(Auth::guard('admin')->check())
        @php
            header("Location: " . URL::to('admin/'), true, 302);
            exit();
//        @endphp
    @endif
    <!--begin::Signin Form-->
    <form class="form w-100 " novalidate="novalidate" id="kt_sign_in_form" action="/admin/login">
    @csrf

        <img alt="Logo" src="{{ asset('assets/images/logos/logo1.webp') }}" class="h-100px" style="
    margin: 0 auto;
    display: block;
">
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
{{--            <h1 class="text-dark fw-bolder mb-3">Panel Girişi</h1>--}}
            <!--end::Title-->
            <!--begin::Subtitle-->
{{--            <div class="text-gray-500 fw-semibold fs-6">{{ Auth::guard('admin')->check() ? Auth::guard('admin')->user()->name : 'false' }}</div>--}}
            <!--end::Subtitle=-->
        </div>
        <!--begin::Heading-->
        <!--begin::Input group=-->
        <div class="fv-row mb-8 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
            <!--begin::Email-->
                <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" required autofocus>

            <!--end::Email-->
        </div>
        <!--end::Input group=-->
        <div class="fv-row mb-3 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
            <!--begin::Password-->
            <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" >
            <!--end::Password-->
        </div>
        <!--end::Input group=-->
        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>
            @if (Route::has('admin.password.request'))
            <!--begin::Link-->
                <a href="{{ theme()->getPageUrl('admin.password.request') }}" class="link-primary">Parolamı Unuttum ?</a>
                <!--end::Link-->
            @endif
        </div>
        <!--end::Wrapper-->
        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                @include('partials.general._button-indicator', ['label' => __('Devam')])
            </button>
        </div>
        <!--end::Submit button-->

    </form>
    <!--end::Signin Form-->

</x-auth-layout>
