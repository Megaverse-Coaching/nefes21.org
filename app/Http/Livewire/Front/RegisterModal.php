<?php

namespace App\Http\Livewire\Front;

use App\Mail\NewUser;
use App\Models\Front\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\{Auth, Hash, Mail};
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class RegisterModal extends Component
{

    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $password_confirmation;

    protected function rules(): array
    {
        return [
            'email'      => 'required|email:rfc,dns|unique:users,email',
            'first_name' => 'required|string|max:32',
            'last_name'  => 'required|string|max:32',
            'password'   => ['required', 'confirmed', Password::defaults()],
        ];
    }


    protected function messages(): array
    {
        return [
            'token.required' => 'Token yoksa giriş de yok! Sayfayı yenileyin!',
            'email.required' => 'Lütfen geçerli bir mail adresi giriniz.',
            'email.email' => ':attribute değeri :input geçerli bir mail adresi değil!', //notice here we are using dynamic values provided by the form submission.
            'password.required' => 'Parolanızı girmeniz gerekmektedir.',
            'password.min' => 'Lütfen en az 8 karakterli bir parola giriniz!',
            'password.letter' => 'Lütfen en az 2 karakterli bir parola giriniz!',
            'password.number' => 'Lütfen en az bir adet sayı giriniz!',
            'password.symbol' => 'Lütfen en az bir adet sembol giriniz!',
            'password.confirm' => 'Hayır! Parolanız eşleşmemektedir. Tekrar deneyin!'
        ];
    }

    public function submitRegisterForm(): void
    {
        $this->validate();

        $user = User::create([
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

        event(new Registered($user));
        Auth::login($user);

        Mail::to($this->email)->send(new newUser($user));

        // Reset form fields
        $this->first_name = '';
        $this->last_name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';

        // Show success message
        session()->flash('message', 'Kayıt işlemi başarılı oldu. Lütfen e-postanızı kontrol ediniz!');
    }
    public function render()
    {
        return view('livewire.front.register-modal');
    }
}
