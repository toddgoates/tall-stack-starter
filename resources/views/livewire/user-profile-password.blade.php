<section class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-3">
    <div class="px-4 sm:px-0">
        <h2 class="text-base font-semibold leading-7 text-gray-900">
            Update Password
        </h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </div>

    <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" wire:submit="updatePassword">
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
                    <label for="current_password" class="block text-sm font-medium leading-6 text-gray-900">
                        Current Password
                    </label>
                    <div class="mt-2">
                        <input id="current_password" wire:model="currentPassword" type="password" autocomplete="current-password"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        @error('currentPassword')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="new_password" class="block text-sm font-medium leading-6 text-gray-900">
                        New Password
                    </label>
                    <div class="mt-2">
                        <input id="new_password" wire:model="password" type="password" autocomplete="new-password"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        @error('password')
                            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">
                        Confirm New Password
                    </label>
                    <div class="mt-2">
                        <input id="password_confirmation" wire:model="passwordConfirmation" type="password" autocomplete="new-password"
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                        @error('passwordConfirmation')
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