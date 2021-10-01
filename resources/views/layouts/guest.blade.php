<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="h-screen min-h-full">
        <div class="pb-8 font-sans text-gray-900 min-h-full bg-white dark:bg-gray-900 antialiased {{ env('APP_DEBUG') ? 'debug-screens' : '' }}">
            {{ $slot }}
            <div class="pb-12 mt-24">
                <div class="max-w-4xl px-4 mx-auto text-gray-400">
                    <div class="pb-4 mb-2 border-t border-gray-100 dark:border-gray-800"></div>
                    <div class="flex flex-col justify-between lg:flex-row">
                        <div>
                            <a href="https://github.com/DanielRTRD/daniel.rtrd.no" class="text-xs hover:text-gray-500">Built with Laravel and Tailwind, check it out on <i class="fab fa-github"></i>Github</a>
                        </div>
                        <div class="pt-6 space-x-6 font-medium lg:pt-0">
                            <a href="https://twitter.com/danielrtrd" class="transition-colors rounded hover:text-red-500 focus:text-red-500 focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-red-500 focus-visible:ring-opacity-60 focus-visible:outline-none focus:outline-none">Twitter</a>
                            <a href="https://www.youtube.com/c/danielrtrd" class="transition-colors rounded hover:text-red-500 focus:text-red-500 focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-red-500 focus-visible:ring-opacity-60 focus-visible:outline-none focus:outline-none">YouTube</a>
                            <a href="https://github.com/danielrtrd" class="transition-colors rounded hover:text-red-500 focus:text-red-500 focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-red-500 focus-visible:ring-opacity-60 focus-visible:outline-none focus:outline-none">GitHub</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
