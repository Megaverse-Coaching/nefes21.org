<div class="col-xl-3 col-lg-7 col-md-9 col-sm-11 mx-auto loginModal">
    <div class="card" x-show="loginModal" x-on:click.away="loginModal = false" x-transition.duration.500ms x-cloak>
        <div class="card-body p-sm-5">
            <img id="logo" src="{{ asset('assets/images/logos/logo1.webp') }}" alt="Nefes21 — Kişisel Gelişim Platformu">
            <div class="text-gray-500 fw-semibold fs-6"></div>
            <form wire:submit.prevent="submitLoginForm" class="mt-5" id="nefes_sign_in_form">
                @csrf
                <div class="mb- fv-row">
                    <label for="email" class="form-label fw-medium">E-posta adresiniz</label>
                    <input wire:model="email" name="email" type="text" id="loginEmail" class="form-control"></div>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                <div class="mb-2 fv-row">
                    <label for="password" class="form-label fw-medium">Parolanız</label>
                    <input wire:model="password" name="password" type="password" id="loginPassword" class="form-control" autocomplete="current-password"></div>
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                <div class="mb-4 text-end">
                    <a href="#" class="link-primary fw-medium">Şifremi Unuttum!</a>
                </div>
                <div class="">
                    <input type="submit"  id="nefes_sign_in_submit" class="btn btn-primary w-100" value="Giriş">
                </div>
            </form>
            @if (session()->has('message'))
                <div class="success">{{ session('message') }}</div>
            @endif
        </div>
    </div>
</div>
