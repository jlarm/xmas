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
    <body class="font-sans text-gray-900 antialiased">
        <div class="mt-5sm:pt-0 flex min-h-screen flex-col items-center p-6">
            <div>
                <a href="/" wire:navigate>
                    <x-application-logo class="h-20 w-20 fill-current text-gray-500" />
                </a>
            </div>

            <div class="mt-6 w-full max-w-4xl overflow-hidden bg-white sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
        @fluxScripts
        <flux:toast />
    </body>
</html>
