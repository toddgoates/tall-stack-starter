<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Sign In')]
class Login extends Component
{
    public function render()
    {
        return view('livewire.login');
    }
}
