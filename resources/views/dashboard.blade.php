<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @role('super-admin')
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                        href="{{ route('courses.index') }}">
                        <div class="p-5">
                            <div class="flex-1 w-full ml-2">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{ $courses }}</div>

                                    <div class="mt-1 text-base text-gray-600">Courses</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                        href="{{ route('certifications.index') }}">
                        <div class="p-5">
                            <div class="flex-1 w-full ml-2">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{ $certifications }}</div>

                                    <div class="mt-1 text-base text-gray-600">Certifications</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                        href="{{ route('companies.index') }}">
                        <div class="p-5">
                            <div class="flex-1 w-full ml-2">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{ $companies }}</div>

                                    <div class="mt-1 text-base text-gray-600">Companies</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                        href="{{ route('experiences.index') }}">
                        <div class="p-5">
                            <div class="flex-1 w-full ml-2">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{ $experiences }}</div>

                                    <div class="mt-1 text-base text-gray-600">Experiences</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                        href="{{ route('socials.index') }}">
                        <div class="p-5">
                            <div class="flex-1 w-full ml-2">
                                <div>
                                    <div class="mt-3 text-3xl font-bold leading-8">{{ $socials }}</div>

                                    <div class="mt-1 text-base text-gray-600">Socials</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @else
                <h1 class="text-3xl font-bold leading-tight text-center lg:text-4xl">Welcome {{ auth()->user()->name }}! &#x1F44B;</h1>
                @role('headhunter')
                    <div class="max-w-2xl p-3 mx-auto text-center">
                        <p class="py-1 leading-tight text-1xl">Now you should have access to anything I would like to share with you. &#x1F604;</p>
                        <a href="{{ route('timeline') }}" class="inline-block px-3 py-2 m-2 mt-8 text-indigo-100 transition-colors duration-150 bg-indigo-500 rounded-lg focus:shadow-outline hover:bg-indigo-600"><i class="fas fa-business-time"></i> Check out my timeline</a>
                    </div>
                @endrole
                @unlessrole('headhunter')
                    <div class="max-w-2xl p-3 mx-auto text-center">
                        <p class="py-1 leading-tight text-1xl">Seems like you do not have permission from me to view anything yet. &#x1F62C;</p>
                        <p class="py-1 leading-tight text-1xl">I don't give out access automatically, because spam-bots is always present, that way I have more control. I hope that you understand. &#x1F604;</p>
                        <a href="{{ route('want-access') }}" class="inline-block px-6 py-3 m-2 mt-8 text-lg text-indigo-100 transition-colors duration-150 bg-indigo-500 rounded-lg focus:shadow-outline hover:bg-indigo-600"><i class="fas fa-bullhorn"></i> Ask me for access &dagger;</a>
                        <p class="mt-3 text-xs text-gray-600">&dagger; This will just notify me via email that you want access and then I will send you an email when you get your access.</p>
                    </div>
                @endunlessrole
            @endrole
        </div>
    </div>
</x-app-layout>
