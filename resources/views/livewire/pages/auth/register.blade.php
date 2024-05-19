<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $matricola = '';
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public function mount()
    {
        $user = auth()->user();
        if ($user->matricola != '123') {
            return redirect()->route('dashboard');
        }
    }
    /**
     * Handle an incoming registration request.
     */
    public function register()
    {
        $validated = $this->validate([
            'matricola' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered(($user = User::create($validated))));

        // Auth::login($user);
        return redirect('register')->with('status', 'User created successfully');

        // $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div class="mx-6">
    @if (session('status'))
    <div class="dark:bg-gray-800 dark:text-yellow-300 mb-4 rounded-lg bg-yellow-50 p-4 text-sm text-yellow-800" role="alert">
        <span class="font-medium">{{ session('status') }}</span>
    </div>
    @endif
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="mt-1 block w-full" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div class="mt-4">
            <x-input-label for="matricola" :value="__('Matricola')" />
            <x-text-input wire:model="matricola" id="matricola" class="mt-1 block w-full" type="text" name="matricola" required autofocus autocomplete="matricola" />
            <x-input-error :messages="$errors->get('matricola')" class="mt-2" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="mt-1 block w-full" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="mt-1 block w-full" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            {{-- <a class="dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800 rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                href="{{ route('login') }}" wire:navigate>
            {{ __('Already registered?') }}
            </a> --}}

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</div>