<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full antialiased">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{ seo()->render() }}

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @vite('resources/css/app.css')
        @livewireStyles

        <!-- FavIcon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
        <link rel="icon" type="image/png" href="{{ asset('favicon/favicon.ico') }}">

        <!-- Scripts -->
        @vite('resources/js/app.js')
        @production
            <script defer data-domain="dsbilling.no" src="https://plausible.io/js/plausible.js"></script>
        @endproduction
    </head>
    <body class="flex h-full bg-slate-50 dark:bg-slate-900 {{ config('app.debug') ? 'debug-screens' : '' }}">
        <div class="flex w-full my-12">
{{--            <div class="fixed inset-0 flex justify-center sm:px-8">
                <div class="flex w-full max-w-7xl lg:px-8">
                    <div class="w-full bg-white ring-1 ring-slate-100 dark:bg-slate-900 dark:ring-slate-300/20"></div>
                </div>
            </div>--}}{{--            <div class="fixed inset-0 flex justify-center sm:px-8">
                <div class="flex w-full max-w-7xl lg:px-8">
                    <div class="w-full bg-white ring-1 ring-slate-100 dark:bg-slate-900 dark:ring-slate-300/20"></div>
                </div>
            </div>--}}
            <div class="relative flex w-full flex-col">
                {{--<nav x-data="{ open: false }" class="px-4 bg-white md:px-8 dark:bg-gray-900">
                    <div class="max-w-4xl mx-auto">
                        <div class="flex items-center justify-between w-full h-16">
                            <div class="flex items-center">
                                <a class="flex" href="{{ route('home') }}">
                                    <div class="flex items-center font-semibold tracking-wider text-gray-900 uppercase transition-colors dark:text-white hover:text-orange-400 focus:text-orange-400 focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-orange-500 focus-visible:ring-opacity-60 focus-visible:outline-none focus:outline-none">{{ config('app.name') }}</div>
                                </a>
                            </div>
                            <div class="hidden sm:block">
                                <div class="flex items-baseline ml-auto space-x-3">
                                    @if(config('blog.uses'))<x-nav-link-front href="{{ route('uses') }}">My Setup</x-nav-link-front>@endif
                                    @if(\App\Models\Post::isPublished()->count() > 0)<x-nav-link-front href="{{ route('blog.index') }}">Blog</x-nav-link-front>@endif
                                </div>
                            </div>
                            <div class="flex -mr-2 sm:hidden">
                                <button @click="open = !open"
                                    class="inline-flex items-center justify-center p-2 text-gray-800 rounded-md dark:text-white hover:text-orange-400 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 6h16M4 12h16M4 18h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                            @if(config('blog.uses'))<x-nav-link-responsive-front href="{{ route('uses') }}">My Setup</x-nav-link-responsive-front>@endif
                            @if(\App\Models\Post::isPublished()->count() > 0)<x-nav-link-responsive-front href="{{ route('blog.index') }}">Blog</x-nav-link-responsive-front>@endif
                        </div>
                    </div>
                </nav>--}}
                <main class="flex-auto mx-auto w-full max-w-7xl px-4 sm:px-8 lg:px-12">
                    {{ $slot }}
                </main>
                <div class="flex-auto mx-auto w-full max-w-7xl px-4 sm:px-8 lg:px-12 mt-16">
                    <div class="mx-auto max-w-2xl lg:max-w-5xl">
                        <div class="mx-auto my-6 text-center text-sm">
                            <a href="https://github.com/dsbilling/dsbilling.no" class="text-gray-300 hover:text-gray-500 dark:text-gray-600 dark:hover:text-gray-400">Built with TALL stack and it is open-source on <i class="fab fa-github"></i>Github</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @livewireScripts
    </body>
</html>
