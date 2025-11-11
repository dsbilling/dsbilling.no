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

    {{-- Plausible Analytics Script --}}
    @production
        <script defer data-domain="dsbilling.no" src="https://plausible.io/js/plausible.js"></script>
    @endproduction

    {{-- Rybbit Analytics Script --}}
    @production
        <script async defer src="{{ config('services.rybbit.instance_url', 'https://app.rybbit.io') }}/api/script.js" data-site-id="{{ config('services.rybbit.site_id') }}"></script>
    @endproduction
</head>
<body class="flex h-full bg-slate-50 dark:bg-slate-900 {{ config('app.debug') ? 'debug-screens' : '' }}">
<div class="flex w-full my-12">
    <div class="relative flex w-full flex-col">
        <div class="mx-auto w-full max-w-7xl lg:px-8">
            <div class="relative px-4 sm:px-8 lg:px-12">
                <div class="mx-auto max-w-2xl lg:max-w-5xl">
                    <div class="relative gap-4 grid grid-flow-row sm:grid-flow-col sm:grid-cols-6">
                        <div class="sm:col-span-2 lg:col-span-1 items-center mx-auto flex">
                            <h1 class="font-semibold text-slate-900 dark:text-white">Daniel S. Billing</h1>
                        </div>
                        <div class="sm:col-span-4">
                            <nav class="pointer-events-auto block mx-auto sm:justify-end md:mx-auto">
                                <ul class="flex mx-auto w-fit rounded-full bg-white/90 px-3 text-sm font-medium text-slate-800 shadow-lg shadow-slate-800/5 ring-1 ring-slate-900/5 backdrop-blur dark:bg-slate-800/90 dark:text-slate-200 dark:ring-white/10">
                                    <li><x-nav-link-front href="{{ route('home') }}" :active="request()->routeIs('home')">Home</x-nav-link-front></li>
                                    <li><x-nav-link-front href="{{ route('blog.index') }}" :active="request()->routeIs('blog.*')">Blog</x-nav-link-front></li>
                                    <li><x-nav-link-front href="{{ route('about') }}" :active="request()->routeIs('about')">About</x-nav-link-front></li>
                                    @if(config('blog.uses'))
                                        <li><x-nav-link-front href="{{ route('uses') }}">My Setup</x-nav-link-front></li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                        <div class="hidden sm:block"></div>
                    </div>
                </div>
            </div>
        </div>
        <main class="flex-auto mx-auto w-full max-w-7xl px-4 sm:px-8 lg:px-12 mt-24">
            {{ $slot }}
        </main>
        <div class="flex-auto mx-auto w-full max-w-7xl px-4 sm:px-8 lg:px-12 mt-16">
            <div class="mx-auto max-w-2xl lg:max-w-5xl">
                <div class="mx-auto my-6 text-center text-sm">
                    <a href="https://github.com/dsbilling/dsbilling.no"
                       class="text-gray-300 hover:text-gray-500 dark:text-gray-600 dark:hover:text-gray-400">Built with
                        TALL stack and it is open-source on <i class="fab fa-github"></i>Github</a>
                </div>
            </div>
        </div>
    </div>
</div>

@livewireScripts
</body>
</html>
