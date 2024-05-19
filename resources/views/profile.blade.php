<x-app-layout>
    <x-slot name="header">
        <h2 class="dark:text-gray-200 text-xl font-semibold leading-tight text-gray-800">
            <h2 class="dark:text-gray-200 text-xl font-semibold leading-tight text-gray-800">
                {{ __('Profile') }}
            </h2>
    </x-slot>
    <div class="dark:bg-gray-900 mx-auto max-w-7xl space-y-6 bg-gray-100 sm:px-6 lg:px-8">
        <h2 class="dark:text-gray-200 p-3 text-3xl font-semibold leading-tight text-gray-800">Area utente</h2>

        <div class="dark:bg-gray-800 bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div class="max-w-xl">
                <livewire:profile.update-profile-information-form />
            </div>
        </div>

        <div class="dark:bg-gray-800 bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div class="max-w-xl">
                <livewire:profile.update-password-form />
            </div>
        </div>

        {{-- <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <livewire:profile.delete-user-form />
                </div>
            </div> --}}
        <div class="dark:bg-gray-800 bg-white p-4 shadow sm:rounded-lg sm:p-8">
            <div class="max-w-xl">

                <livewire:profile.logout />
            </div>
        </div>
        <div class="h-20">
        </div>
    </div>
</x-app-layout>
