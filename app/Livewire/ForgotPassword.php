<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Forgot Password')]
class ForgotPassword extends Component
{
    #[Validate('required|email')]
    public $email;

    public $message = '';

    public $messageColor = '';

    public function requestpassword()
    {
        $this->reset(['message', 'messageColor']);
        $this->validate();

        $status = Password::sendResetLink(['email' => $this->email]);

        if ($status === Password::RESET_LINK_SENT) {
            $this->message = "We have emailed you a password reset link.";
            $this->messageColor = 'green';
            $this->reset('email');
        } else {
            $this->message = "There was a problem sending you the password reset link.";
            $this->messageColor = 'red';
        }
    }

    public function render()
    {
        return view('livewire.forgot-password');
    }
}
