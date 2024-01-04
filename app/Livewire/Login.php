<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Sign In')]
class Login extends Component
{
    #[Validate('required|email')]
    public $email;

    #[Validate('required|min:8')]
    public $password;

    public function login()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {
            session()->regenerate();

            return redirect()->route('home');
        }

        $this->addError('email', 'Your credentials are invalid.');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
