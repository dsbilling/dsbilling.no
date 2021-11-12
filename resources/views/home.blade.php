<x-guest-layout>
    <nav x-data="{ open: false }" class="px-4 bg-white dark:bg-gray-900 sm:px-0">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between w-full h-16">
                <div class="flex items-center">
                    <a class="flex" href="{{ route('home') }}">
                        <div
                            class="flex items-center font-semibold tracking-wider text-gray-900 uppercase transition-colors dark:text-white hover:text-red-400 focus:text-red-400 focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500 focus-visible:ring-opacity-60 focus-visible:outline-none focus:outline-none">
                            {{ config('app.name') }}</div>
                    </a>
                </div>
                <div class="block">
                    <div class="flex items-center ml-4 md:ml-6">
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="flex items-baseline ml-auto space-x-3">
                        <x-nav-link-front href="{{ route('register') }}">CV</x-nav-link-front>
                    </div>
                </div>
                <div class="flex -mr-2 md:hidden">
                    <button @click="open = !open"
                        class="inline-flex items-center justify-center p-2 text-gray-800 rounded-md dark:text-white hover:text-red-400 focus:outline-none">
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
                <x-nav-link-responsive-front href="{{ route('register') }}">CV</x-nav-link-responsive-front>
            </div>
        </div>
    </nav>
    <main class="max-w-4xl px-4 mx-auto mt-8 antialiased sm:mt-16 sm:px-0">
        <div class="space-y-14 lg:space-y-24">
            <section id="about">
                <div class="container mx-auto">
                    <div class="space-x-5 lg:flex item-center lg:-mx-4">
                        <div class="lg:px-4 ">
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-50 lg:text-4xl">Hi there, I'm Daniel &#x1F44B;</h1>
                            <div class="mt-4 text-gray-800 dark:text-gray-100">
                                <p>I work as a <x-gradient-text>Systems Developer</x-gradient-text> in the <x-gradient-text>AV</x-gradient-text> department at <x-link-text link="https://intility.no">Intility</x-link-text> &mdash; focusing on developing a internal portal, but I also do develop solutions for digital signage as well as programming meetingrooms, audiotoriums, and operation centers with <x-link-text link="https://crestron.com">Crestron</x-link-text>.</p>
                                <p class="mt-2">I do <x-gradient-text>Laravel</x-gradient-text> development as a hobby/side-job, and <x-gradient-text>freelance work</x-gradient-text> for <x-gradient-text>e-sport</x-gradient-text> teams, <x-gradient-text>LAN-parties</x-gradient-text>, <x-gradient-text>games</x-gradient-text> and <x-gradient-text>digital communities</x-gradient-text>. <span class="pb-0 border-b border-gray-400 border-dashed dark:border-gray-500">I love making websites that are usable, simple and user-friendly.</span></p>
                                <p class="mt-2">If you want to get in touch with me use one of my socials. <x-gradient-text>Say hi!</x-gradient-text></p>
                            </div>
                        </div>
                        <div class="items-center flex-shrink-0 mx-auto mt-12 lg:px-4 lg:mt-0 sm:mx-0">
                            <img alt="Profile" src="{{ asset('img/daniel.jpg') }}" class="flex w-56 h-56 rounded-full">
                        </div>
                    </div>
                </div>
            </section>

            {{--
            <section id="blog">
                <div class="container mx-auto">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Recent Posts</h2>
                    <h4 class="mt-2 text-gray-500 dark:text-gray-400">Thoughts on what I'm building and learning.</h4>
                    <div class="pt-10 sm:grid sm:grid-cols-2 sm:gap-10">

                        <div class="m-auto overflow-hidden rounded-lg shadow-lg cursor-pointer group">
                            <a href="#" class="block w-full h-full">
                                <img alt="blog photo" src="{{ asset('img/daniel.jpg') }}" class="object-cover w-full max-h-40"/>
                                <div class="w-full p-4 bg-white dark:bg-gray-800">
                                    <p class="text-sm font-medium text-indigo-500">
                                        1 min read
                                    </p>
                                    <p class="mb-2 text-xl font-medium text-gray-800 dark:text-white group-hover:text-red-500">
                                        How I Built My Site with Laravel
                                    </p>
                                    <p class="font-light text-gray-400 dark:text-gray-300 text-md">
                                        OMG, this is how I built my site with Laravel. I'm so proud of this. And here is how I built it. It is so easy to learn and use.
                                    </p>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </section>
            --}}
        </div>
    </main>
    <div class="pb-6 mt-24">
        <div class="max-w-4xl px-4 mx-auto text-xs text-gray-400 sm:px-0">
            <div class="pb-4 mb-2 border-t border-gray-100 dark:border-gray-800"></div>
            <div class="flex flex-row justify-between">
                <div class="space-x-4 space-y-2 font-medium">
                    @foreach ($socials as $social)
                        <a href="{{$social->link}}" class="transition-colors rounded hover:text-red-500 focus:text-red-500 focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-red-500 focus-visible:ring-opacity-60 focus-visible:outline-none focus:outline-none"><i class="{{$social->icon}} text-sm"></i>{{$social->name}}</a>
                    @endforeach
                </div>
            </div>
            <div class="justify-center mx-auto my-4">
                <a href="https://github.com/DanielRTRD/daniel.rtrd.no" class="text-gray-400 hover:text-gray-500 dark:text-gray-500 dark:hover:text-gray-400">Built with Laravel and Tailwind, check it out on <i class="fab fa-github"></i>Github</a>
            </div>
        </div>
    </div>
</x-guest-layout>
