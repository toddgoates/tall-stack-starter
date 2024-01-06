<?php

use App\Livewire\ForgotPassword;
use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Notification;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ForgotPassword::class)
        ->assertStatus(200);
});

it('has an email field', function () {
    Livewire::test(ForgotPassword::class)
        ->assertSee('Email');
});

it('validates the email field is required', function () {
    $user = User::factory()->create();

    Livewire::test(ForgotPassword::class)
        ->set('email', '')
        ->call('requestpassword')
        ->assertHasErrors(['email' => 'required']);
});

it('validates the email field is an email', function () {
    $user = User::factory()->create();

    Livewire::test(ForgotPassword::class)
        ->set('email', 'not-an-email')
        ->call('requestpassword')
        ->assertHasErrors(['email' => 'email']);
});

it('sends a password reset link', function () {
    Notification::fake();

    $user = User::factory()->create();

    Livewire::test(ForgotPassword::class)
        ->set('email', $user->email)
        ->call('requestpassword')
        ->assertSee('We have emailed you a password reset link.');

    Notification::assertSentTo($user, ResetPassword::class);
});
