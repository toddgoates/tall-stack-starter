<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Profile')]
class UserProfile extends Component
{
    use WithFileUploads;

    public $photo;

    public $profilePic;

    public $name;

    public $email;

    public $currentPassword;

    public $password;

    public $passwordConfirmation;

    public $photoMessage = '';

    public $profileInfoMessage = '';

    public $passwordMessage = '';

    public $messageColor = '';

    public function mount()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->profilePic = auth()->user()->profile_photo_path;
    }

    public function updateProfilePic()
    {
        $this->reset(['photoMessage', 'messageColor']);
        $this->validate([
            'photo' => 'image|max:1024',
        ]);

        $path = $this->photo->store('profile-photos', 'public');

        auth()->user()->update([
            'profile_photo_path' => $path,
        ]);

        $this->photoMessage = 'Your profile pic has been uploaded successfully.';
        $this->messageColor = 'green';
        $this->profilePic = auth()->user()->profile_photo_path;

        $this->reset('photo');

        $this->dispatch('profilePicUpdated');
    }

    public function deleteProfilePic()
    {
        $this->reset(['photoMessage', 'messageColor']);
        auth()->user()->update([
            'profile_photo_path' => null,
        ]);

        $this->photoMessage = 'Your profile pic has been deleted successfully.';
        $this->messageColor = 'green';
        $this->profilePic = auth()->user()->profile_photo_path;

        $this->dispatch('profilePicUpdated');
    }

    public function updatePersonalInfo()
    {
        $this->reset(['profileInfoMessage', 'messageColor']);
        $this->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
        ]);

        auth()->user()->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->profileInfoMessage = 'Your personal information has been updated.';
        $this->messageColor = 'green';
    }

    public function updatePassword()
    {
        $this->reset(['passwordMessage', 'messageColor']);
        $this->validate([
            'currentPassword' => 'required',
            'password' => 'required|min:8',
            'passwordConfirmation' => [
                'required',
                'same:password',
            ]
        ]);

        if (auth()->attempt(['email' => auth()->user()->email, 'password' => $this->currentPassword])) {
            auth()->user()->update([
                'password' => Hash::make($this->password),
            ]);

            $this->passwordMessage = 'Your password has been updated.';
            $this->messageColor = 'green';
            $this->reset(['currentPassword', 'password', 'passwordConfirmation']);
        } else {
            $this->passwordMessage = 'Your current password is incorrect.';
            $this->messageColor = 'red';
        }
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
