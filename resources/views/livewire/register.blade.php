<main class="h-[calc(100vh-64px)] bg-gray-300 text-gray-800 flex justify-center items-center">
    <div class="bg-gray-100 rounded p-6 shadow-lg m-6 w-full md:w-1/2 lg:w-1/3">
        <h1 class="text-4xl font-extrabold mb-8">Sign up for an account</h1>
        <form class="space-y-8 mb-12" wire:submit="register" x-data="{ showPassword: false }">
            <div>
                <label for="name" class="block mb-1 font-semibold">Name</label>
                <input type="text" wire:model="name" id="name" class="w-full rounded" />
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="email" class="block mb-1 font-semibold">Email</label>
                <input type="email" wire:model="email" id="email" class="w-full rounded" />
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <label for="password" class="block mb-1 font-semibold">Password</label>
                <div class="mt-2 flex rounded-md shadow-sm">
                    <div class="relative flex flex-grow items-stretch focus-within:z-10">
                        <input x-bind:type="showPassword ? 'text' : 'password'" wire:model="password" id="password" class="w-full rounded-none rounded-l">
                    </div>
                    <button type="button" x-on:click="showPassword = !showPassword" class="relative -ml-px inline-flex items-center gap-x-1.5 rounded-r px-3 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-700 hover:bg-gray-50">
                        <svg x-show="!showPassword" class="-ml-0.5 h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                        <svg x-show="showPassword" class="-ml-0.5 h-5 w-5 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                        </svg>
                    </button>
                </div>
                @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <button 
                    type="submit" 
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded py-2">
                    Sign Up
                </button>
            </div>
        </form>
        <div class="flex flex-col gap-4">
            <p>Already have an account?
                <a href="{{ route('login') }}" wire:navigate class="font-semibold underline">
                    Log in
                </a>
            </p>
        </div>
    </div>
</main>
