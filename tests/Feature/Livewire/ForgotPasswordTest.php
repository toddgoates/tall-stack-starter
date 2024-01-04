<?php

use App\Livewire\ForgotPassword;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ForgotPassword::class)
        ->assertStatus(200);
});
