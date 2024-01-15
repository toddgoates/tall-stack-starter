<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserProfileInfo extends Component
{
    public User $user;

    public $name;

    public $email;

    public $message = '';

    public $messageColor = '';

    public function mount()
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function updatePersonalInfo()
    {
        $this->reset(['message', 'messageColor']);
        $this->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
        ]);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->message = 'Your personal information has been updated.';
        $this->messageColor = 'green';
    }

    public function render()
    {
        return view('livewire.user-profile-info');
    }
}
