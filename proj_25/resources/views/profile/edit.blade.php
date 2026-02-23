<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl space-y-6">

                    @if(auth()->user()->avatar)
                    <div class="mb-4">
                        <img src="{{ Storage::url('images/avatars/' . auth()->user()->avatar) }}"
                            alt="Profilna slika"
                            class="w-16 h-16 rounded-full object-cover border border-gray-300 dark:border-gray-600">
                    </div>
                    @endif

                    <form action="{{ route('profile.changeAvatar') }}"
                        method="POST"
                        enctype="multipart/form-data"
                        class="space-y-6">

                        @csrf

                        <div>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Promeni profilnu sliku
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Izaberi novu profilnu sliku (JPG, PNG, WEBP). Maksimalna veličina 2MB.
                            </p>
                        </div>

                        <div class="mt-4">
                            <input type="file"
                                name="avatar"
                                accept="image/*"
                                class="block w-full text-sm text-gray-900
                              border border-gray-300 rounded-lg cursor-pointer
                              bg-gray-50 focus:outline-none dark:bg-gray-700 dark:border-gray-600
                              dark:text-gray-200">

                            @error('avatar')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-start mt-4">
                            <button type="submit"
                                class="px-4 py-2 bg-gray-800 text-white rounded-lg 
                               hover:bg-gray-900 focus:outline-none focus:ring-2 
                               focus:ring-gray-700 transition">
                                Save
                            </button>
                        </div>

                    </form>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>