<nav class="flex items-center justify-end space-x-2 p-2">
    @auth
        {{-- <x-notification></x-notification> --}}
    @else
    @endauth
    <x-toggle-dark></x-toggle-dark>
</nav>
