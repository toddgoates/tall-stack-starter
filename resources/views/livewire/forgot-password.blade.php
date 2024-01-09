<main class="h-[calc(100vh-64px)] bg-gray-300 text-gray-800 flex justify-center items-center">
    <div class="bg-gray-100 rounded p-6 shadow-lg m-6 w-full md:w-1/2 lg:w-1/3">
        <h1 class="text-4xl font-extrabold mb-8">Retrieve your account</h1>
        <div x-show="$wire.message" x-transition
            :class="{
                'bg-green-300 text-green-800 border-l-4 border-green-800 p-4 my-4': $wire.messageColor === 'green',
                'bg-red-300 text-red-800 border-l-4 border-red-800 p-4 my-4': $wire.messageColor === 'red',
            }" 
            role="alert"
        >
            {{ $message }}
        </div>
        <form class="space-y-8" wire:submit="requestpassword">
            <div>
                <label for="email" class="block mb-1 font-semibold">Email</label>
                <input type="email" wire:model="email" id="email" class="w-full rounded" />
                @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>

            <div>
                <button 
                    type="submit" 
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded py-2">
                    Find account
                </button>
            </div>
        </form>
    </div>
</main>
