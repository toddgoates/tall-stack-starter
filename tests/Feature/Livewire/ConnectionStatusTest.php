<?php

use App\Livewire\ConnectionStatus;
use Livewire\Livewire;

it('renders successfully', function () {
    Livewire::test(ConnectionStatus::class)
        ->assertStatus(200);
});

it('renders an offline message when offline', function () {
    Livewire::test(ConnectionStatus::class)
        ->set('offline', true)
        ->assertSee('Your device has lost its internet connection. The web page you are viewing is now offline.');
});
