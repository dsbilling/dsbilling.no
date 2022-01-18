<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-6 mt-5">
                <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl dark:bg-black hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                    href="{{ route('courses.index') }}">
                    <div class="p-5">
                        <div class="flex-1 w-full ml-2">
                            <div>
                                <div class="mt-3 text-3xl font-bold leading-8 dark:text-white"">{{ $courses }}</div>

                                <div class="mt-1 text-base text-gray-600 dark:text-gray-400">Courses</div>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl dark:bg-black hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                    href="{{ route('certifications.index') }}">
                    <div class="p-5">
                        <div class="flex-1 w-full ml-2">
                            <div>
                                <div class="mt-3 text-3xl font-bold leading-8 dark:text-white"">{{ $certifications }}</div>

                                <div class="mt-1 text-base text-gray-600 dark:text-gray-400">Certifications</div>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl dark:bg-black hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                    href="{{ route('companies.index') }}">
                    <div class="p-5">
                        <div class="flex-1 w-full ml-2">
                            <div>
                                <div class="mt-3 text-3xl font-bold leading-8 dark:text-white"">{{ $companies }}</div>

                                <div class="mt-1 text-base text-gray-600 dark:text-gray-400">Companies</div>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl dark:bg-black hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                    href="{{ route('experiences.index') }}">
                    <div class="p-5">
                        <div class="flex-1 w-full ml-2">
                            <div>
                                <div class="mt-3 text-3xl font-bold leading-8 dark:text-white">{{ $experiences }}</div>

                                <div class="mt-1 text-base text-gray-600 dark:text-gray-400">Experiences</div>
                            </div>
                        </div>
                    </div>
                </a>
                <a class="col-span-12 transition duration-300 transform bg-white rounded-lg shadow-xl dark:bg-black hover:scale-105 sm:col-span-6 xl:col-span-3 intro-y"
                    href="{{ route('socials.index') }}">
                    <div class="p-5">
                        <div class="flex-1 w-full ml-2">
                            <div>
                                <div class="mt-3 text-3xl font-bold leading-8 dark:text-white"">{{ $socials }}</div>

                                <div class="mt-1 text-base text-gray-600 dark:text-gray-400">Socials</div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
