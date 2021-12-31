<x-guest-layout>
    <div class="flex flex-col max-w-2xl mx-auto mt-6 sm:mt-0">

        <h1 class="text-3xl font-semibold sm:text-4xl lg:text-5xl break-word"><x-gradient-text>{{ $post->title }}</x-gradient-text></h1>

        <p class="text-sm font-medium text-orange-800/90 dark:text-orange-100/50">
            {{ $post->user->name }} &middot; {{ now()->subMonth(1) > $post->published_at ? $post->published_at->isoFormat('D MMMM YYYY') : $post->published_at->diffForHumans() }} &middot; {{ read_time($post->body)}} &middot;  {{ App\Helpers\NumberHelper::nearestK(views($post)->count()) }} {{ Str::plural('view', views($post)->count()) }} &middot; {{ $post->likes_count }} {{ Str::plural('like', $post->likes_count) }}
            {{--@foreach ($post->tags as $tag)
                <span class="inline-flex items-center justify-center mr-1 font-semibold leading-none uppercase">{{ $tag->name }}</span>
            @endforeach--}}
        </p>

        @if (now()->subYears(1) > $post->published_at)
            <div class="flex items-center p-2 my-8 text-sm leading-none bg-orange-700 rounded-lg text-orange-50 lg:rounded-xl lg:inline-flex sm:text-base" role="alert">
                <span class="flex px-1 py-1 mr-3 text-xs font-bold text-white uppercase bg-orange-400 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                <span class="flex-auto mr-2 font-semibold text-left">This article is older than one year, some information might be out of date!</span>
            </div>
        @endif

        {{--<div class="flex items-center justify-center pb-8 mt-4 text-xs leading-5 text-center border-b border-gray-100 dark:border-gray-700">
            @foreach ($post->tags as $tag)
                <span class="inline-flex items-center justify-center px-2 py-1 mr-1 font-bold leading-none uppercase bg-gray-900 rounded text-orange-50 dark:text-gray-300 dark:bg-gray-700">{{ $tag->name }}</span>
            @endforeach
        </div>--}}
        
        <article class="w-full mt-6 prose lg:mt-10 dark:prose-invert prose-a:text-orange-500 prose-h1:text-4xl">
            {!! $html !!}
            {{--<x-markdown>{{ $post->body }}</x-markdown>--}}
        </article>
        
    </div>
</x-guest-layout>
