<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'GamePersona') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body class="
    relative flex flex-col min-h-screen
    bg-gradient-to-r
    dark:from-dark-bg-grad-l
    dark:to-dark-bg-grad-r
    from-bg-grad-l
    to-bg-grad-r
    selection:bg-red-500 selection:text-white
    dark:text-white
">        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/" class="flex items-center gap-2">
                    <x-icon name="game-persona-logo" class="sm:h-12 sm:w-12 h-10 w-10 bg-transparent"/>
                    <h1 class="font-mono sm:text-2xl text-xl font-semibold hover:text-fuchsia-600 hover:drop-shadow-[0_0_10px_#eb34eb]
                        dark:text-white dark:hover:text-fuchsia-300 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                        GAME<br>PERSONA
                    </h1>
                </a>
            </div>

{{ $slot }}
        </div>
    </body>
</html>