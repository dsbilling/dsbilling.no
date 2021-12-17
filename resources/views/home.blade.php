<x-guest-layout>
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

        @if($posts->count() > 0)
            <section id="blog">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Recent Posts</h2>
                <h4 class="mt-2 text-gray-500 dark:text-gray-400 text-md">My thoughts on what I'm building and learning.</h4>
                <div class="grid gap-4 pt-8 sm:gap-6 md:grid-cols-3 lg:gap-10">

                    @foreach ($posts as $post)
                        <div class="m-auto overflow-hidden rounded-lg shadow-lg cursor-pointer group">
                            <a href="{{ route('blog.show', $post->slug) }}" class="block w-full h-full">
                                {{--<img alt="blog photo" src="{{ asset('img/daniel.jpg') }}" class="object-cover w-full max-h-28"/>--}}
                                <div class="w-full p-4 bg-white dark:bg-gray-800 hover:dark:bg-gray-700">
                                    <p class="text-sm font-medium text-orange-400">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                        </svg> {{ read_time($post->body) }} &middot; 
                                        <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg> {{ App\Helpers\NumberHelper::nearestK(views($post)->count()) }}
                                    </p>
                                    <p class="my-2 text-xl font-semibold text-gray-800 dark:text-white">
                                        {{ $post->title }}
                                    </p>
                                    <p class="text-sm font-light text-gray-400 dark:text-gray-300">
                                        {!! strip_tags(Str::of(Str::limit($post->body, 300))->markdown()) !!}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach

                </div>
            </section>
        @endif
    </div>
</x-guest-layout>
