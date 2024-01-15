<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Profile')]
class UserProfile extends Component
{
    public function render()
    {
        return view('livewire.user-profile', [
            'user' => auth()->user(),
        ]);
    }
}
