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
            class="bg-red-300 text-red-800 border-l-4 border-red-800 p-4 w-full flex gap-4 items-center"
            role="alert"
        >
            <svg class="size-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m3 3 8.735 8.735m0 0a.374.374 0 1 1 .53.53m-.53-.53.53.53m0 0L21 21M14.652 9.348a3.75 3.75 0 0 1 0 5.304m2.121-7.425a6.75 6.75 0 0 1 0 9.546m2.121-11.667c3.808 3.807 3.808 9.98 0 13.788m-9.546-4.242a3.733 3.733 0 0 1-1.06-2.122m-1.061 4.243a6.75 6.75 0 0 1-1.625-6.929m-.496 9.05c-3.068-3.067-3.664-7.67-1.79-11.334M12 12h.008v.008H12V12Z" />
            </svg>
            <p>Your device has lost its internet connection. The web page you are viewing is now offline.</p>
        </div>
        HTML;
    }
}
