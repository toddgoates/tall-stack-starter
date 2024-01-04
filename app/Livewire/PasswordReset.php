<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Reset Your Password')]
class PasswordReset extends Component
{
    #[Validate('required|email')]
    public $email;

    #[Validate('required|min:8|confirmed')]
    public $password;

    public $password_confirmation;

    public $token;

    public $message = '';

    public $messageColor = '';

    public function mount($token)
    {
        $this->token = $token;
    }

    public function resetpassword()
    {
        $this->reset(['message', 'messageColor']);
        $this->validate();

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function ($user, $password) {
                $user->forceFill([
                    'password' => $password,
                ])->save();
            }
        );

        if ($status) {
            return redirect()
                ->route('login')
                ->with('status', 'Your password has been reset successfully!');
        }

        $this->message = "There was a problem resetting your password.";
        $this->messageColor = 'red';
    }

    public function render()
    {
        return view('livewire.password-reset');
    }
}
