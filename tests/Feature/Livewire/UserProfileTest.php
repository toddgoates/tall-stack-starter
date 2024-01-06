<?php

use App\Livewire\UserProfile;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(UserProfile::class)
        ->assertStatus(200);
})->skip();
