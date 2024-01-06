<?php

use App\Livewire\Login;
use App\Models\User;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Login::class)
        ->assertStatus(200);
});

it('has an email and password field', function () {
    Livewire::test(Login::class)
        ->assertSee('Email')
        ->assertSee('Password');
});

it('validates the email field is required', function () {
    Livewire::test(Login::class)
        ->set('email', '')
        ->call('login')
        ->assertHasErrors(['email' => 'required']);
});

it('validates the email field is a valid email', function () {
    Livewire::test(Login::class)
        ->set('email', 'foo')
        ->call('login')
        ->assertHasErrors(['email' => 'email']);
});

it('validates the password field is required', function () {
    Livewire::test(Login::class)
        ->set('password', '')
        ->call('login')
        ->assertHasErrors(['password' => 'required']);
});

it('validates the password field has a min of 8 characters', function () {
    Livewire::test(Login::class)
        ->set('password', 'foo')
        ->call('login')
        ->assertHasErrors(['password' => 'min']);
});

it('redirects to the home page on successful login', function () {
    $user = User::factory()->create();

    Livewire::test(Login::class)
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('login')
        ->assertRedirect(route('home'));
});

it('displays an error message on failed login', function () {
    Livewire::test(Login::class)
        ->set('email', 'test@test.test')
        ->set('password', 'password')
        ->call('login')
        ->assertHasErrors('email');
});
