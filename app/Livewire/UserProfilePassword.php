<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UserProfilePassword extends Component
{
    public User $user;

    public $currentPassword;

    public $password;

    public $passwordConfirmation;

    public $message = '';

    public $messageColor = '';

    public function updatePassword()
    {
        $this->reset(['message', 'messageColor']);
        $this->validate([
            'currentPassword' => 'required',
            'password' => 'required|min:8',
            'passwordConfirmation' => [
                'required',
                'same:password',
            ]
        ]);

        if (auth()->attempt(['email' => $this->user->email, 'password' => $this->currentPassword])) {
            $this->user->update([
                'password' => Hash::make($this->password),
            ]);

            $this->message = 'Your password has been updated.';
            $this->messageColor = 'green';
            $this->reset(['currentPassword', 'password', 'passwordConfirmation']);
        } else {
            $this->message = 'Your current password is incorrect.';
            $this->messageColor = 'red';
        }
    }

    public function render()
    {
        return view('livewire.user-profile-password');
    }
}
