<section class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-3">
    <div class="px-4 sm:px-0">
        <h2 class="text-base font-semibold leading-7 text-gray-900">
            Personal Information
        </h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">
            Update your account's profile information and email address.
        </p>
    </div>

    <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" wire:submit="updatePersonalInfo">
        <div class="px-4 py-6 sm:p-8">
            <div
                wire:key="{{ rand() }}"
                x-show="$wire.message" 
                x-transition
                x-init="setTimeout(() => {$wire.message = ''; $wire.messageColor = '';}, 5000)"
                :class="{
                    'bg-green-300 text-green-800 border-l-4 border-green-800 p-4 my-4': $wire
                        .messageColor === 'green',
                    'bg-red-300 text-red-800 border-l-4 border-red-800 p-4 my-4': $wire
                        .messageColor === 'red',
                }"
                role="alert"
            >
                {{ $message }}
            </div>
            <div class="grid max-w-2xl grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">
                        Name
                    </label>
                    <div class="mt-2">
                        <input id="name" wire:model="name" type="text" autocomplete="name"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        @error('name')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">
                        Email
                    </label>
                    <div class="mt-2">
                        <input id="email" wire:model="email" type="email" autocomplete="email"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        @error('email')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
            <button 
                type="submit"
                class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
            >
                Save
            </button>
        </div>
    </form>
</section>