<?php

use App\Livewire\UserProfile;
use App\Models\User;
use Livewire\Livewire;

it('renders successfully', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(UserProfile::class)
        ->assertStatus(200);
});

it('validates the user\'s personal information', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(UserProfile::class)
        ->set('name', '')
        ->set('email', '')
        ->call('updatePersonalInfo')
        ->assertHasErrors(['name', 'email'])
        ->assertSee('The name field is required.')
        ->assertSee('The email field is required.');
});

it('updates the user\'s personal information', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(UserProfile::class)
        ->set('name', 'John Doe')
        ->set('email', 'john@example.com')
        ->call('updatePersonalInfo')
        ->assertSee('message', 'Your personal information has been updated.')
        ->assertSee('messageColor', 'green')
        ->assertSee('name', 'John Doe')
        ->assertSee('email', 'john@example.com');
});

it('validates the user\'s password', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(UserProfile::class)
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
        ->test(UserProfile::class)
        ->set('currentPassword', 'password')
        ->set('password', 'new-password')
        ->set('passwordConfirmation', 'new-password')
        ->call('updatePassword')
        ->assertSee('message', 'Your password has been updated.')
        ->assertSee('messageColor', 'green');
});
