<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Sign Up')]
class Register extends Component
{
    #[Validate('required|min:2')]
    public $name;

    #[Validate('required|email|unique:users')]
    public $email;

    #[Validate('required|min:8')]
    public $password;

    public function register()
    {
        $credentials = $this->validate();

        $user = User::create($credentials);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.register');
    }
}
