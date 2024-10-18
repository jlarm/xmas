<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link rel="icon" href="https://fav.farm/🎄" />

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @livewireStyles
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            <main>
                {{ $slot }}
            </main>
        </div>
        @livewireScriptConfig
        @fluxScripts
        <flux:toast />
    </body>
</html>
