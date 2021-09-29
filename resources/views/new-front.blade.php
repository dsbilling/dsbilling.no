<x-guest-layout>
    <div class="bg-white">
        <nav x-data="{ open: false }" class="bg-white dark:bg-gray-900">
            <div class="max-w-5xl mx-auto">
                <div class="flex items-center justify-between w-full h-16">
                    <div class="flex items-center">
                        <a class="flex" href="{{ route('home') }}">
                            <div class="flex items-center font-semibold tracking-wider text-gray-900 uppercase transition-colors hover:text-red-400 focus:text-red-400 focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500 focus-visible:ring-opacity-60 focus-visible:outline-none focus:outline-none">{{ config('app.name') }}</div>
                        </a>
                    </div>
                    <div class="block">
                        <div class="flex items-center ml-4 md:ml-6">
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="flex items-baseline ml-auto space-x-3">
                            <x-nav-link-front href="{{ route('login') }}">About</x-nav-link-front>
                            <x-nav-link-front href="{{ route('login') }}">Blog</x-nav-link-front>
                            <x-nav-link-front href="{{ route('login') }}">Contact</x-nav-link-front>
                        </div>
                    </div>
                    <div class="flex -mr-2 md:hidden">
                        <button @click="open = !open" class="inline-flex items-center justify-center p-2 text-gray-800 rounded-md dark:text-white hover:text-gray-300 focus:outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                    <a class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:text-gray-800 dark:hover:text-white" href="/#">
                        Home
                    </a>
                    <a class="block px-3 py-2 text-base font-medium text-gray-800 rounded-md dark:text-white" href="/#">
                        Gallery
                    </a>
                    <a class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:text-gray-800 dark:hover:text-white" href="/#">
                        Content
                    </a>
                    <a class="block px-3 py-2 text-base font-medium text-gray-300 rounded-md hover:text-gray-800 dark:hover:text-white" href="/#">
                        Contact
                    </a>
                </div>
            </div>
        </nav>
        <div class="flex flex-col max-w-5xl min-h-screen mx-auto bg-black">
            


            <div class="w-full p-6 mt-6 overflow-hidden prose bg-gray-200 shadow-md sm:rounded-lg">
                Kake kan være godt.
            </div>
        </div>
    </div>
</x-guest-layout>
