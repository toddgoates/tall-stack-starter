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
