<?php

use App\Livewire\PasswordReset;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(PasswordReset::class)
        ->assertStatus(200);
});
