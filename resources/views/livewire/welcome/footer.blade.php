<footer class="fixed bottom-0 flex w-full items-center justify-between rounded-t-[40px] bg-footer px-8 py-4">
    <!-- HOME -->
    <a class="{{ Route::currentRouteName() == 'dashboard' ? 'bg-primary w-32' : '' }} flex items-center rounded-full"
        href="{{ route('dashboard') }}" wire:navigate wire:transition>
        <div
            class="{{ Route::currentRouteName() == 'dashboard' ? 'bg-primary-light' : '' }} size-14 flex items-center justify-center rounded-full">
            @if (Route::currentRouteName() == 'dashboard')
                <x-phosphor-house-fill class="size-6 fill-white"></x-phosphor-house-fill>
            @else
                <x-phosphor-house xmlns="http://www.w3.org/2000/svg"
                    class="size-6 fill-white"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->

                </x-phosphor-house>
            @endif
        </div>
        <p class="{{ Route::currentRouteName() == 'dashboard' ? 'block' : 'hidden' }} ml-2 text-white text-opacity-80">
            Home
        </p>
    </a>
    <!-- SCANSIONA (da sistemare) -->
    <a wire:navigate wire:transition
        class="{{ Route::currentRouteName() == 'scanner' ? 'bg-primary w-32' : '' }} flex items-center rounded-full"
        href="{{ route('scanner') }}">
        <div
            class="{{ Route::currentRouteName() == 'scanner' ? 'bg-primary-light' : '' }} size-14 flex items-center justify-center rounded-full">
            @if (Route::currentRouteName() == 'scanner')
                <x-phosphor-qr-code-fill xmlns="http://www.w3.org/2000/svg"
                    class="size-6 fill-white"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->

                </x-phosphor-qr-code-fill>
            @else
                <x-phosphor-qr-code class="size-6 fill-white"></x-phosphor-qr-code>
            @endif
        </div>
        <p class="{{ Route::currentRouteName() == 'scanner' ? 'block' : 'hidden' }} ml-2 text-white text-opacity-80">
            Scan</p>
    </a>
    <!-- STATS (da sistemare) -->
    <a class="{{ Route::currentRouteName() == 'stats' ? 'bg-primary w-32' : '' }} flex items-center rounded-full"
        href="{{ route('stats') }}" wire:navigate wire:transition>
        <div
            class="{{ Route::currentRouteName() == 'stats' ? 'bg-primary-light' : '' }} size-14 flex items-center justify-center rounded-full">
            @if (Route::currentRouteName() == 'stats')
                <x-phosphor-chart-donut-fill class="size-6 fill-white"></x-phosphor-chart-donut-fill>
            @else
                <x-phosphor-chart-donut xmlns="http://www.w3.org/2000/svg"
                    class="size-6 fill-white"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->

                </x-phosphor-chart-donut>
            @endif
        </div>
        <p class="{{ Route::currentRouteName() == 'stats' ? 'block' : 'hidden' }} ml-2 text-white text-opacity-80">
            Stats</p>
    </a>
    <!-- ACCOUNT -->
    <a class="{{ Route::currentRouteName() == 'profile' ? 'bg-primary w-32' : '' }} flex items-center rounded-full"
        href="{{ route('profile') }}" wire:navigate wire:transition>
        <div
            class="{{ Route::currentRouteName() == 'profile' ? 'bg-primary-light' : '' }} size-14 flex items-center justify-center rounded-full">
            @if (Route::currentRouteName() == 'profile')
                <x-phosphor-user-fill class="size-6 fill-white"></x-phosphor-user-fill>
            @else
                <x-phosphor-user xmlns="http://www.w3.org/2000/svg"
                    class="size-6 fill-white"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->

                </x-phosphor-user>
            @endif
        </div>
        <p class="{{ Route::currentRouteName() == 'profile' ? 'block' : 'hidden' }} ml-2 text-white text-opacity-80">
            Profilo</p>
    </a>
</footer>
