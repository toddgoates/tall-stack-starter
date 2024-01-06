<?php

use App\Livewire\PasswordReset;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(PasswordReset::class, [
        'token' => 'token',
    ])->assertStatus(200);
});

it('has an email, password, and password confirmation field', function () {
    Livewire::test(PasswordReset::class, [
        'token' => 'token',
    ])
        ->assertSee('Password')
        ->assertSee('Confirm Password');
});

it('validates the password is required', function () {
    Livewire::test(PasswordReset::class, [
        'token' => 'token',
    ])
        ->set('password', '')
        ->call('resetpassword')
        ->assertHasErrors(['password' => 'required']);
});

it('validates the password has a min of 8 characters', function () {
    Livewire::test(PasswordReset::class, [
        'token' => 'token',
    ])
        ->set('password', 'secret')
        ->call('resetpassword')
        ->assertHasErrors(['password' => 'min']);
});

it('validates the password and confirmation field match', function () {
    Livewire::test(PasswordReset::class, [
        'token' => 'token',
    ])
        ->set('password', 'password')
        ->set('password_confirmation', 'not-password')
        ->call('resetpassword')
        ->assertHasErrors(['password' => 'confirmed']);
});

it('resets the password', function () {
    $user = User::factory()->create();

    $token = Password::createToken($user);

    Livewire::test(PasswordReset::class, [
        'token' => $token,
    ])
        ->set('email', $user->email)
        ->set('password', 'password')
        ->set('password_confirmation', 'password')
        ->call('resetpassword')
        ->assertSessionHas('status', 'Your password has been reset successfully!')
        ->assertRedirect(route('login'));

    $this->assertTrue(Hash::check('password', $user->fresh()->password));
});
