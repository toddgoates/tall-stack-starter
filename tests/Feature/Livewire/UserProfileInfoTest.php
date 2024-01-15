<?php

use App\Livewire\UserProfileInfo;
use App\Models\User;
use Livewire\Livewire;

it('renders successfully', function () {
    $user = User::factory()->create();
    
    Livewire::actingAs($user)
        ->test(UserProfileInfo::class, ['user' => $user])
        ->assertStatus(200);
});

it('validates the user\'s personal information', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(UserProfileInfo::class, ['user' => $user])
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
        ->test(UserProfileInfo::class, ['user' => $user])
        ->set('name', 'John Doe')
        ->set('email', 'john@example.com')
        ->call('updatePersonalInfo')
        ->assertSee('message', 'Your personal information has been updated.')
        ->assertSee('messageColor', 'green')
        ->assertSee('name', 'John Doe')
        ->assertSee('email', 'john@example.com');
});
