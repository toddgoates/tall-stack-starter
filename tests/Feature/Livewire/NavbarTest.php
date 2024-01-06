<?php

use App\Livewire\Navbar;
use App\Models\User;
use Livewire\Livewire;

it('shows a log in and register button for guests', function () {
    Livewire::test(Navbar::class)
        ->assertSee('Log in')
        ->assertSee('Register');
});

it('shows links and a log out button for logged in users', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(Navbar::class)
        ->assertSee('Dashboard')
        ->assertSee('Sign out');
});

it('logs users out', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
        ->test(Navbar::class)
        ->call('logout')
        ->assertRedirect(route('login'));

    $this->assertGuest();
});
