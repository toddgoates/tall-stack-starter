<?php

use App\Livewire\Register;
use App\Models\User;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(Register::class)
        ->assertStatus(200);
});

it('has a name, email, and password field', function () {
    Livewire::test(Register::class)
        ->assertSee('Name')
        ->assertSee('Email')
        ->assertSee('Password');
});

it('validates the name field is required', function () {
    Livewire::test(Register::class)
        ->set('name', '')
        ->call('register')
        ->assertHasErrors(['name' => 'required']);
});

it('validates the name field has a min of 2 characters', function () {
    Livewire::test(Register::class)
        ->set('name', 'a')
        ->call('register')
        ->assertHasErrors(['name' => 'min']);
});

it('validates the email field is required', function () {
    Livewire::test(Register::class)
        ->set('email', '')
        ->call('register')
        ->assertHasErrors(['email' => 'required']);
});

it('validates the email field is a valid email', function () {
    Livewire::test(Register::class)
        ->set('email', 'foo')
        ->call('register')
        ->assertHasErrors(['email' => 'email']);
});

it('validates that the email field is unique', function () {
    $user = User::factory()->create();

    Livewire::test(Register::class)
        ->set('email', $user->email)
        ->call('register')
        ->assertHasErrors(['email' => 'unique']);
});

it('validates the password field is required', function () {
    Livewire::test(Register::class)
        ->set('password', '')
        ->call('register')
        ->assertHasErrors(['password' => 'required']);
});

it('validates the password field has a min of 8 characters', function () {
    Livewire::test(Register::class)
        ->set('password', 'foo')
        ->call('register')
        ->assertHasErrors(['password' => 'min']);
});

it('redirects to the home page on successful registration', function () {
    Livewire::test(Register::class)
        ->set('name', 'Test User')
        ->set('email', 'test@test.test')
        ->set('password', 'password')
        ->call('register')
        ->assertRedirect(route('home'));
});
