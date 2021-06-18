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

        <!-- FavIcon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
        <link rel="icon" type="image/png" href="{{ asset('favicon/favicon.ico') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased bg-cover bg-fixed bg-center bg-fk">
        <x-jet-banner />

        <div class="flex flex-col min-h-full h-screen justify-between text-white">

            <header class="flex items-center w-full my-6">
                <nav class="flex flex-wrap items-center justify-center w-full text-gray-500 font-bold">
                    @foreach($socials as $social)
                        <a class="mx-4 my-2 hover:text-gray-300 inline-block align-middle" href="{{ $social->link }}"><i class="{{ $social->icon }}"></i>{{ $social->name }}</a>
                    @endforeach
                </nav>
            </header>

            <main class="max-w-5xl mx-auto flex content-center">
                <div class="flex gap-8 flex-wrap p-8">
                    <div class="flex w-full md:w-auto">
                        <img src="{{ asset('img/daniel.jpg') }}" class="h-64 rounded-full mx-auto border-white border-solid border-8 sm:float-right">
                    </div>
                    <div class="flex-initial md:flex-1" x-data="{ showMore: false }">

                        <h1 class="text-4xl">Hello, I'm Daniel S. Billing &#x1F44B;</h1>
                        <h5 class="text-xl mb-4">...a Software Systems Engineer from Norway &#x1F1F3;&#x1F1F4;</h5>

                        <p class="py-2">I have {{ $certifications }} certifications, {{ $courses }} courses and {{ ($experience) ? $experience->diffInYears(now()) : '0' }} years of experience under my belt. &#x1F913;</p>
                        
                        <p class="py-2">What I do in short; AV Systems Development as a primary job, PHP/Laravel as a hobby/side-job, and freelance work for e-sport teams and LAN-parties.</p>
                        
                        <p class="py-2">If you want to get in touch with me use one of my socials on the top of this page. Say hi! &#x1F44A;</p>

                        <a href="{{ route('register') }}" class="px-4 py-2 my-4 text-gray-200 transition-colors duration-150 bg-yellow-600 rounded focus:shadow-outline hover:bg-yellow-700"><i class="far fa-file-alt"></i> Get my detailed CV</a>
                        
                        <button type="button" class="px-4 py-2 my-4 text-gray-200 transition-colors duration-150 bg-gray-800 rounded focus:shadow-outline hover:bg-gray-700" @click="showMore = !showMore">More about me <i class="fas " :class="{ 'fa-long-arrow-alt-down': !showMore, 'fa-long-arrow-alt-up': showMore }"></i></button>

                        <div class="transition-all duration-300" :class="{ ' hidden max-h-0': !showMore }" :style="handleToggle()">
                            <p class="py-2">I started my career by getting my diploma for the media graphics profession. After this I go a job as a Support Technician at <a class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-blue-400 rounded-full" href="https://intility.no" rel="noreferrer">Intility</a>. About three years later I moved to the AV department of the same company, and that was over {{ now()->diffInYears('2015-08-01') }} years ago.</p>

                            <p class="py-2">In the AV realm I have been developing meeting room control with <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-blue-600 rounded-full">Crestron</span> and creating digital signage displays with <a class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-red-600 rounded-full" href="https://scala.com" rel="noreferrer">Scala</a> and <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-gray-900 rounded-full">Python</span>. &#x1F4FA;</p>

                            <p class="py-2">For my hobby projects I create stuff with <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-gray-900 rounded-full">VB.NET</span>, <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-gray-900 rounded-full">Python</span> and <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-gray-900 rounded-full">PHP</span> with <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-gray-900 rounded-full">Laravel</span> under my own name or my company's name <a class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-yellow-600 rounded-full" href="https://infihex.com">Infihex</a>. Most of these are available on <a class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-gray-900 rounded-full" href="https://github.com/DanielRTRD" rel="noreferrer"><i class="fab fa-github"></i>Github</a>. I am trying to release most of my projects as open-source in 2021, so keep your eyes open. &#x1F440;</p>

                            <p class="py-2">While doing all of the above I also do freelance work for <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-gray-900 rounded-full">E-sport</span> teams, <span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none bg-gray-900 rounded-full">LAN-parties</span> and more. So I am quite busy from time to time. &#x1F605;</p>
                        </div>
                    </div>
                </div>
            </main>

            <div class="flex flex-col text-xs">
                <div class="flex items-center justify-center my-4 text-gray-600 hover:text-gray-500">
                    Built with Laravel {{ explode('.', Illuminate\Foundation\Application::VERSION)[0] }} and Tailwind, check it out on <a class="ml-1" href="https://github.com/DanielRTRD/daniel.rtrd.no"><i class="fab fa-github"></i>Github</a>
                </div>
            </div>

        </div>


        @stack('modals')

        @livewireScripts
</body>
</html>
