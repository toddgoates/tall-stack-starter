<section class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-3">
    <div class="px-4 sm:px-0">
        <h2 class="text-base font-semibold leading-7 text-gray-900">
            Profile Photo
        </h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">
            Upload a profile photo for your account.
        </p>
    </div>

    <form class="bg-white shadow-sm ring-1 ring-gray-900/5 sm:rounded-xl md:col-span-2" wire:submit="updateProfilePic">
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
                    @if ($profilePic)
                        <img src="/{{ $profilePic }}" alt="Profile Photo" class="rounded-full size-28" />
                    @else
                        <label for="photo" class="block text-sm font-medium leading-6 text-gray-900">
                            Profile Photo
                        </label>
                        <div class="mt-2">
                            <input id="photo" wire:model="photo" type="file"
                                class="block w-full rounded-md border-0 p-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600 sm:text-sm sm:leading-6">
                            @error('photo')
                                <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end gap-x-6 border-t border-gray-900/10 px-4 py-4 sm:px-8">
            @if ($profilePic)
                <button
                    type="button"
                    wire:confirm="Are you sure you want to remove your profile photo?"
                    wire:click="deleteProfilePic"
                    class="rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-600"
                >
                    Remove
                </button>
            @else
                <button 
                    type="submit"
                    class="rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600"
                >
                    Save
                </button>
            @endif
        </div>
    </form>
</section>