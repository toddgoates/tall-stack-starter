<?php

use App\Livewire\UserProfilePhoto;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

it('renders successfully', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(UserProfilePhoto::class, ['user' => $user])
        ->assertStatus(200);
});

it('validates the profile pic', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(UserProfilePhoto::class, ['user' => $user])
        ->set('photo', '')
        ->call('updateProfilePic')
        ->assertHasErrors(['photo'])
        ->assertSee('The photo field is required.');
});

it('updates the profile pic', function () {
    Storage::fake('public');
    $file = UploadedFile::fake()->image('avatar.png');
    
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(UserProfilePhoto::class, ['user' => $user])
        ->set('photo', $file)
        ->call('updateProfilePic')
        ->assertSee('message', 'Your profile pic has been uploaded successfully.')
        ->assertSee('messageColor', 'green');
});

it('removes the profile pic', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(UserProfilePhoto::class, ['user' => $user])
        ->call('deleteProfilePic')
        ->assertSee('message', 'Your profile pic has been deleted successfully.')
        ->assertSee('messageColor', 'green');
});