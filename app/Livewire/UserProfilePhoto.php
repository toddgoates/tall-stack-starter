<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfilePhoto extends Component
{
    use WithFileUploads;

    public User $user;

    public $photo;

    public $profilePic;

    public $message = '';

    public $messageColor = '';

    public function mount()
    {
        $this->profilePic = $this->user->profile_photo_path;
    }

    public function updateProfilePic()
    {
        $this->reset(['message', 'messageColor']);
        $this->validate([
            'photo' => 'required|image|max:1024',
        ]);

        $path = $this->photo->store('profile-photos', 'public');

        $this->user->update([
            'profile_photo_path' => $path,
        ]);

        $this->message = 'Your profile pic has been uploaded successfully.';
        $this->messageColor = 'green';
        $this->profilePic = $this->user->profile_photo_path;

        $this->reset('photo');

        $this->dispatch('profilePicUpdated');
    }

    public function deleteProfilePic()
    {
        $this->reset(['message', 'messageColor']);
        $this->user->update([
            'profile_photo_path' => null,
        ]);

        $this->message = 'Your profile pic has been deleted successfully.';
        $this->messageColor = 'green';
        $this->profilePic = $this->user->profile_photo_path;

        $this->dispatch('profilePicUpdated');
    }

    public function render()
    {
        return view('livewire.user-profile-photo');
    }
}
