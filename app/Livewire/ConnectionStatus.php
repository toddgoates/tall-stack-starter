<?php

namespace App\Livewire;

use Livewire\Component;

class ConnectionStatus extends Component
{
    public function render()
    {
        return <<<'HTML'
        <div 
            wire:offline
            x-transition
            class="bg-red-300 text-red-800 border-l-4 border-red-800 p-4 w-full"
            role="alert"
        >
            Whoops, your device has lost connection. The web page you are viewing is offline.
        </div>
        HTML;
    }
}
