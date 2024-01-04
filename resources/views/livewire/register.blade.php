<main class="h-[calc(100vh-64px)] bg-gray-300 text-gray-800 flex justify-center items-center">
    <div class="bg-gray-100 rounded p-6 shadow-lg">
        <h1 class="text-4xl font-extrabold mb-8">Sign up for an account</h1>
        <form class="space-y-8" wire:submit="register">
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
                <input type="password" wire:model="password" id="password" class="w-full rounded" />
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
    </div>
</main>
