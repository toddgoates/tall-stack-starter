<div>
  <nav 
    class="bg-gray-800 relative" 
    x-data="{ mobileMenuOpen: false, profileMenuOpen: false }"
    x-on:click.outside="mobileMenuOpen = false; profileMenuOpen = false"
  >
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button type="button" x-on:click="mobileMenuOpen = !mobileMenuOpen" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg :class="mobileMenuOpen ? 'hidden' : 'block'" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg :class="mobileMenuOpen ? 'block' : 'hidden'" class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex flex-shrink-0 items-center">
            <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=blue&shade=500" alt="Your Company">
          </div>
          <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                @auth
                  <a href="{{ route('home') }}" wire:navigate class="{{ Route::currentRouteName() === 'home' ? 'bg-gray-900 text-white' : 'text-gray-300 hover;bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium" aria-current="page">
                    Dashboard
                  </a>
                @endauth
                @guest
                  <a href="{{ route('login') }}" wire:navigate class="{{ Route::currentRouteName() === 'login' ? 'bg-gray-900 text-white' : 'text-gray-300 hover;bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                    Log in
                  </a>
                  <a href="{{ route('register') }}" wire:navigate class="{{ Route::currentRouteName() === 'register' ? 'bg-gray-900 text-white' : 'text-gray-300 hover;bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium">
                    Register
                  </a>
                @endguest
            </div>
          </div>
        </div>
        @auth
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <!-- Profile dropdown -->
          <div class="relative ml-3">
            <div>
              <button type="button" x-on:click="profileMenuOpen = !profileMenuOpen" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                @if ($profilePic)
                  <img class="h-8 w-8 rounded-full" src="{{ $profilePic }}" alt="{{ auth()->user()->name }}">
                @else
                  <span class="inline-flex size-10 items-center justify-center rounded-full bg-gray-500">
                    <span class="font-medium leading-none text-white">
                      {{ auth()->user()->initials() }}
                    </span>
                  </span>
                @endif
              </button>
            </div>

            <div 
              :class="profileMenuOpen ? 'absolute' : 'hidden'" 
              class="right-0 z-20 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" 
              x-transition:enter="transition ease-out duration-100"
              x-transition:enter-start="transform opacity-0 scale-95"
              x-transition:enter-end="transform opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75"
              x-transition:leave-start="transform opacity-100 scale-100"
              x-transition:leave-end="transform opacity-0 scale-95"
              role="menu" 
              aria-orientation="vertical" 
              aria-labelledby="user-menu-button" 
              tabindex="-1"
            >
              <a href="{{ route('profile') }}" wire:navigate class="{{ Route::currentRouteName() === 'profile' ? 'bg-gray-100' : '' }} block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">
                Your Profile
              </a>
              <form wire:submit="logout">
                <button 
                  type="submit" 
                  class="block text-left w-full px-4 py-2 text-sm text-gray-700" 
                  role="menuitem" 
                  tabindex="-1" 
                  id="user-menu-item-2"
                >
                  Sign out
                </button>
              </form>
            </div>
          </div>
        </div>
        @endauth
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div :class="mobileMenuOpen ? 'absolute w-full bg-gray-800 z-10 sm:hidden' : 'hidden'" id="mobile-menu">
      <div class="space-y-1 px-2 pb-3 pt-2">
        @auth
          <a href="{{ route('home') }}" wire:navigate class="{{ Route::currentRouteName() === 'home' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium" aria-current="page">
            Dashboard
          </a>
        @endauth
        @guest
          <a href="{{ route('login') }}" wire:navigate class="{{ Route::currentRouteName() === 'login' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">
            Log in
          </a>
          <a href="{{ route('register') }}" wire:navigate class="{{ Route::currentRouteName() === 'register' ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} block rounded-md px-3 py-2 text-base font-medium">
            Register
          </a>
        @endguest
      </div>
    </div>
  </nav>
  <livewire:connection-status />
</div>