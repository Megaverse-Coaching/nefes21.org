<div class="col-xl-3 col-lg-7 col-md-9 col-sm-11 mx-auto registerModal">
    <div class="card" x-show="registerModal" x-on:click.away="registerModal = false" x-transition.duration.500ms x-cloak>
        <div class="card-body p-sm-5">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @else
                <img id="logo" src="{{ asset('assets/images/logos/logo1.webp') }}" class="my-0 mx-0 mb-3" alt="Nefes21 — Kişisel Gelişim Platformu">
            @endif

            <form class="form w-100" id="signUpForm" wire:submit.prevent="submitRegisterForm">
                @csrf
                <div class="mb-3 fv-row">
                    <label for="first_name" class="form-label fw-medium">Adınız</label>
                    <input wire:model="first_name" name="first_name" type="text" id="first_name" class="form-control" required>
                    @error('first_name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3 fv-row">
                    <label for="last_name" class="form-label fw-medium">Soyadınız</label>
                    <input wire:model="last_name" name="last_name" type="text" id="last_name" class="form-control" required>
                    @error('last_name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3 fv-row">
                    <label for="email" class="form-label fw-medium">E-posta adresiniz</label>
                    <input wire:model="email" name="email" type="email" id="registerEmail" class="form-control" autocomplete="email" required>
                    @error('email') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-2 fv-row">
                    <label for="password" class="form-label fw-medium">Parolanız</label>
                    <input wire:model="password" name="password" type="password" id="registerPassword" class="form-control" autocomplete="new-password" required>
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-2 fv-row">
                    <label for="confirmed" class="form-label fw-medium">Parolanız</label>
                    <input wire:model="password_confirmation" name="password_confirmation" type="password" id="confirmed" class="form-control" autocomplete="new-password" required>
                    @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4 text-end">
                    <a href="#" class="link-primary fw-medium">Şifremi Unuttum!</a>
                </div>
                <div class="">
                    <button class="btn btn-primary w-100">Gönder</button>
                </div>
            </form>
                @if (session()->has('message'))
                    <div class="success">{{ session('message') }}</div>
                @endif
        </div>
    </div>
</div>
