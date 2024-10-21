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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @fluxStyles
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white dark:bg-gray-800">
            <div class="flex justify-center">
                <flux:navbar>
                    <flux:navbar.item wire:navigate href="{{ route('dashboard.kid', 1) }}">Kailee</flux:navbar.item>
                    <flux:navbar.item wire:navigate href="{{ route('dashboard.kid', 2) }}">Becca</flux:navbar.item>
                    <flux:navbar.item wire:navigate href="{{ route('dashboard.kid', 3) }}">Alissa</flux:navbar.item>
                    <flux:navbar.item wire:navigate href="{{ route('dashboard.kid', 4) }}">Jacob</flux:navbar.item>
                </flux:navbar>
            </div>
            <main>
                {{ $slot }}
            </main>
        </div>
        @fluxScripts
        <flux:toast />
    </body>
</html>
