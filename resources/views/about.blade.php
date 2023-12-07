<x-guest-layout>
    <section id="about">
        <div class="space-x-0 sm:space-x-5 lg:flex item-center lg:-mx-4">
            <div>
                <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-50 lg:text-4xl">
                    <x-gradient-text>About me</x-gradient-text>
                </h1>
                <div class="mt-4 text-gray-800 dark:text-gray-100">
                    <p>I currently work as a
                        <x-gradient-text>Backend Lead</x-gradient-text>
                        for
                        <x-link-text link="https://izy.no" noreferrer="true">Izy AS</x-link-text>
                        , where we develop platform for landlords to take care of tenants' needs in a digital
                        everyday life, with an associated mobile application for communication, trade, information
                        and booking.
                    </p>
                    <p class="mt-2">In January 2022, I started my own company called
                        <x-link-text link="https://kilobyte.no">
                            <x-gradient-text>Kilobyte AS</x-gradient-text>
                        </x-link-text>
                        , a technology and development company. Before this I had a sole proprietorship for 10
                        years.
                    </p>
                    <p class="mt-2">I previously worked 10 years at
                        <x-link-text link="https://intility.no" noreferrer="true">Intility AS</x-link-text>
                        as a
                        <x-gradient-text>Systems Developer</x-gradient-text>
                        in the
                        <x-gradient-text>AV</x-gradient-text>
                        department &mdash; focusing on developing an internal portal, but I also do develop
                        solutions for digital signage as well as programming meeting rooms, auditoriums, and
                        operation centers with
                        <x-link-text link="https://crestron.com" noreferrer="true">Crestron</x-link-text>
                        .
                    </p>
                    <p class="mt-2">Other than that I do
                        <x-gradient-text>freelance work</x-gradient-text>
                        for
                        <x-gradient-text>e-sport</x-gradient-text>
                        teams,
                        <x-gradient-text>LAN-parties</x-gradient-text>
                        ,
                        <x-gradient-text>games</x-gradient-text>
                        and
                        <x-gradient-text>digital communities</x-gradient-text>
                        . <span class="pb-0 border-b border-gray-400 border-dashed dark:border-gray-500">I am passionate about creating websites that are not only user-friendly and simple but also highly functional.</span>
                    </p>
                    <p class="mt-2">If you want to get in touch with me use one of my socials.
                        <x-gradient-text>Say hi!</x-gradient-text>
                    </p>
                    <p class="mt-10">If you are interested in me and my experience, you can check out my <x-link-text link="https://linkedin.com/in/dsbilling" noreferrer="true">LinkedIn</x-link-text> or download my CV below.</p>
                    <a class="inline-flex items-center gap-2 justify-center rounded-md py-2 px-3 text-sm outline-offset-2 transition active:transition-none bg-gradient-to-r from-orange-400 to-orange-600 font-bold text-white group mt-6 hover:bg-gradient-to-br hover:shadow-md w-1/4"
                       href="{{ route('cv') }}">Download my CV
                        <svg aria-hidden="true"  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="items-center flex-shrink-0 mx-auto mt-12 lg:px-4 lg:mt-0 sm:mx-0">
                <img alt="Profile" src="{{ asset('img/daniel.jpg') }}"
                     class="flex w-56 h-56 mx-auto rounded-full sm:mx-0">
            </div>
        </div>
    </section>
</x-guest-layout>
