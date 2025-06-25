<?php

namespace App\Http\Livewire\Front;

use App\Models\Front\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Illuminate\Validation\Rules\Password;
use \App\Http\Requests\Auth\LoginRequest;

class LoginModal extends Component
{
    public $email;
    public $password;
    protected function rules(): array
    {
        return [
            'email'      => 'required|email:rfc,dns|unique:users,email',
            'password'   => ['required', 'confirmed', Password::defaults()],
        ];
    }

    protected function messages(): array
    {
        return [
            'token.required' => 'Token yoksa giriş de yok! Sayfayı yenileyin!',
            'email.required' => 'Lütfen geçerli bir mail adresi giriniz.',
            'email.email' => ':attribute değeri :input geçerli bir mail adresi değil!',
            'password.required' => 'Parolanızı girmeniz gerekmektedir.',
            'password.min' => 'Lütfen en az 8 karakterli bir parola giriniz!',
            'password.letter' => 'Lütfen en az 2 karakterli bir parola giriniz!',
            'password.number' => 'Lütfen en az bir adet sayı giriniz!',
            'password.symbol' => 'Lütfen en az bir adet sembol giriniz!',
            'password.confirm' => 'Hayır! Parolanız eşleşmemektedir. Tekrar deneyin!'
        ];
    }

    public function submitLoginForm(LoginRequest $request)
    {
        $this->validate();

        $request->dd();
        $request->authenticate();
        $request->session()->regenerate();

        $this->email = '';
        $this->password = '';

        session()->flash('message', 'Giriş başarılı!');
    }


    public function render()
    {
        return view('livewire.front.login-modal');
    }
}
