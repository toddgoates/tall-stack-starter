<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Profile')]
class UserProfile extends Component
{
    #[Validate(('required|min:2'))]
    public $name;

    #[Validate(('required|email'))]
    public $email;

    public $message = '';

    public $messageColor = '';

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function updatePersonalInfo()
    {
        $this->reset(['message', 'messageColor']);
        $this->validate();

        auth()->user()->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->message = 'Your personal information has been updated.';
        $this->messageColor = 'green';
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
