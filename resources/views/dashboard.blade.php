<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @role('super-admin')
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                        href="{{ route('courses.index') }}">
                        <div class="p-5">
                            <div class="ml-2 w-full flex-1">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{ $courses }}</div>

                                    <div class="mt-1 text-base text-gray-600">Courses</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                        href="{{ route('certifications.index') }}">
                        <div class="p-5">
                            <div class="ml-2 w-full flex-1">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{ $certifications }}</div>

                                    <div class="mt-1 text-base text-gray-600">Certifications</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                        href="{{ route('companies.index') }}">
                        <div class="p-5">
                            <div class="ml-2 w-full flex-1">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{ $companies }}</div>

                                    <div class="mt-1 text-base text-gray-600">Companies</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                        href="{{ route('experiences.index') }}">
                        <div class="p-5">
                            <div class="ml-2 w-full flex-1">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{ $experiences }}</div>

                                    <div class="mt-1 text-base text-gray-600">Experiences</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="transform  hover:scale-105 transition duration-300 shadow-xl rounded-lg col-span-12 sm:col-span-6 xl:col-span-3 intro-y bg-white"
                        href="{{ route('socials.index') }}">
                        <div class="p-5">
                            <div class="ml-2 w-full flex-1">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{ $socials }}</div>

                                    <div class="mt-1 text-base text-gray-600">Socials</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @else
                <h1 class="text-3xl text-center lg:text-4xl font-bold leading-tight">Welcome {{ auth()->user()->name }}! &#x1F44B;</h1>
                @unlessrole('headhunter')
                    <div class="text-center max-w-2xl mx-auto p-3">
                        <p class="text-1xl py-1 leading-tight">Seems like you do not have permission from me to view anything yet. &#x1F62C;</p>
                        <p class="text-1xl py-1 leading-tight">I don't give out access automatically, because spam-bots is always present, I hope you understand. &#x1F604;</p>
                        <button class="h-12 mt-8 px-6 m-2 text-lg text-indigo-100 transition-colors duration-150 bg-indigo-500 rounded-lg focus:shadow-outline hover:bg-indigo-600"><i class="fas fa-bullhorn"></i> Ask me for access &dagger;</button>
                        <p class="text-gray-600 mt-3 text-xs">&dagger; This will just notify me via email that you want access.</p>
                    </div>
                @endunlessrole
            @endrole
        </div>
    </div>
</x-app-layout>
