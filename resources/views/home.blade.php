<x-guest-layout>
    <div class="px-4 space-y-14 lg:space-y-24">
        <section id="about">
            <div class="space-x-5 lg:flex item-center lg:-mx-4">
                <div>
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
        </section>

        @if($posts->count() > 0)
            <section id="blog" class=" lg:-mx-4">
                <h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Recent Posts</h2>
                <h4 class="mt-2 text-gray-500 dark:text-gray-400 text-md">My thoughts on what I'm building and learning.</h4>
                <div class="grid gap-4 pt-8 sm:gap-6 md:grid-cols-2 lg:gap-8">
                    @foreach ($posts as $post)
                        <div class="max-w-full m-auto overflow-hidden border border-gray-200 rounded-lg shadow-lg cursor-pointer dark:border-gray-700 group ">
                            <a href="{{ route('blog.show', $post->slug) }}" class="block w-full h-full">
                                {{--<img alt="blog photo" src="{{ asset('img/daniel.jpg') }}" class="object-cover w-full max-h-28"/>--}}
                                <div class="w-full p-4 bg-white dark:bg-gray-800 hover:dark:bg-gray-700">
                                    <p class="text-xs font-medium text-orange-500 dark:text-orange-400">
                                        {{ $post->user->name }} &middot; {{ $post->published_at->diffForHumans() }} &middot; {{ read_time($post->body)}} &middot;  {{ App\Helpers\NumberHelper::nearestK(views($post)->count()) }} {{ Str::plural('view', views($post)->count()) }} &middot; {{ $post->likes_count }} {{ Str::plural('like', $post->likes_count) }}
                                    </p>
                                    <p class="my-2 text-xl font-semibold text-gray-800 truncate dark:text-white">
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
