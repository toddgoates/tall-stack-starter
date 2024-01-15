<?php

use App\Livewire\UserProfilePassword;
use App\Models\User;
use Livewire\Livewire;

it('renders successfully', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(UserProfilePassword::class, ['user' => $user])
        ->assertStatus(200);
});

it('validates the user\'s password', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(UserProfilePassword::class, ['user' => $user])
        ->set('currentPassword', '')
        ->set('password', '')
        ->set('passwordConfirmation', '')
        ->call('updatePassword')
        ->assertHasErrors(['currentPassword', 'password', 'passwordConfirmation'])
        ->assertSee('The current password field is required.')
        ->assertSee('The password field is required.');
});

it('updates the user\'s password', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(UserProfilePassword::class, ['user' => $user])
        ->set('currentPassword', 'password')
        ->set('password', 'new-password')
        ->set('passwordConfirmation', 'new-password')
        ->call('updatePassword')
        ->assertSee('message', 'Your password has been updated.')
        ->assertSee('messageColor', 'green');
});
