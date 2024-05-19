<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="manifest" href="/manifest.json">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-dvh font-sans antialiased">
    <div class="dark:bg-gray-900 h-full bg-gray-100">
        <livewire:welcome.navigation />
        <!-- Page Content -->
        <main class="h-full w-full">
            {{ $slot }}
        </main>

        <livewire:welcome.footer />
    </div>
</body>

</html>
