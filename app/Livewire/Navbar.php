<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class Navbar extends Component
{
    public function logout()
    {
        Auth::logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect('/login');
    }

    #[On('profilePicUpdated')]
    public function render()
    {
        $profilePic = auth()->user()->profile_photo_path ?? null;

        return view('livewire.navbar', [
            'profilePic' => $profilePic,
        ]);
    }
}
