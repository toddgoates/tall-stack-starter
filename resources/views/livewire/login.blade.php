<main class="h-[calc(100vh-64px)] bg-gray-300 text-gray-800 flex justify-center items-center">
    <div class="bg-gray-100 rounded p-6 shadow-lg">
        <h1 class="text-4xl font-extrabold mb-8">Sign in to your account</h1>
        @if (session('status'))
        <div 
            class="bg-green-300 text-green-800 border-l-4 border-green-800 p-4 my-4" 
            role="alert"
        >
            {{ session('status') }}
        </div>
        @endif
        <form class="space-y-8 mb-12" wire:submit="login">
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
                    Sign In
                </button>
            </div>
        </form>
        <div class="flex flex-col gap-4">
            <p>
                <a href="{{ route('password.request') }}" class="font-semibold underline">Forgot your password?</a>
            </p>
            <p>Don't have an account?
                <a href="{{ route('register') }}" class="font-semibold underline">
                    Sign up
                </a>
            </p>
        </div>
    </div>
</main>
