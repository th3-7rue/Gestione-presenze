<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="mx-6">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="dark:text-white text-center text-2xl font-bold">Login</div>
    <form wire:submit="login">
        <!-- Email Address -->
        <div>
            <div class="mb-2 flex w-full items-center">
                <x-input-label class="w-full font-semibold" for="matricola" :value="__('Matricola')" />
            </div>
            <x-text-input wire:model="form.matricola" id="matricola" class="mt-1 block w-full" name="matricola" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('form.matricola')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="font-semibold" for="password" :value="__('Password')" />

            <x-text-input wire:model="form.password" id="password" class="mt-1 block w-full" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-4 block">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" class="dark:bg-gray-900 dark:border-gray-700 dark:focus:ring-primary-light dark:focus:ring-offset-gray-800 rounded border-gray-300 text-primary shadow-sm focus:ring-primary-light" name="remember">
                <span class="dark:text-gray-400 ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-4 flex flex-col items-center justify-end space-y-2">


            <x-primary-button class="w-60">
                {{ __('Log in') }}
            </x-primary-button>
            @if (Route::has('password.request'))
            <a class="dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800 rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" href="{{ route('password.request') }}" wire:navigate>
                {{ __('Forgot your password?') }}
            </a>
            @endif
        </div>
    </form>
</div>