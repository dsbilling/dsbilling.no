<x-guest-layout>
    <div class="flex flex-col max-w-2xl mx-auto">

        {{--<a href="{{ route('blog.index') }}" class="text-base md:text-sm text-orange-400 hover:text-orange-300 font-bold no-underline mb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>
            Back to the blog
        </a>--}}

        <time datetime="{{ $post->published_at->isoFormat('Y-m-d') }}" class="order-first flex items-center text-sm sm:text-base text-slate-400 dark:text-slate-500"><span class="h-4 w-0.5 rounded-full bg-slate-200 dark:bg-slate-500"></span><span class="ml-3">{{ $post->published_at->isoFormat('D. MMMM YYYY') }}</span></time>

        <h1 class="text-3xl font-semibold sm:text-4xl lg:text-5xl break-word mt-4"><x-gradient-text>{{ $post->title }}</x-gradient-text></h1>

        <p class="text-xs sm:text-sm font-medium text-gray-400 mt-2">
            {{ read_time($post->body)}} &middot;  {{ App\Helpers\NumberHelper::nearestK(views($post)->count()) }} {{ Str::plural('view', views($post)->count()) }} &middot; {{ $post->likes_count }} {{ Str::plural('like', $post->likes_count) }} {!! $post->updated_at > $post->published_at ? ' &middot; Updated ' . $post->updated_at->isoFormat('D. MMMM YYYY [at] HH:mm') : '' !!}
            {{--@foreach ($post->tags as $tag)
                <span class="inline-flex items-center justify-center mr-1 font-semibold leading-none uppercase">{{ $tag->name }}</span>
            @endforeach--}}
        </p>

        @if (now()->subYears(1) > $post->published_at)
            <div class="rounded-md p-4 mt-8 font-semibold bg-blue-50 dark:bg-blue-900 text-blue-800 dark:text-blue-100 border border-blue-200 dark:border-blue-700">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3 flex-1 md:flex md:justify-between">
                        <p class="text-sm">{{ __('Note: This article was published over a year ago. Information within may have changed since then. While efforts are made to keep content current, please verify critical details before making decisions based on this information.') }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{--<div class="flex items-center justify-center pb-8 mt-4 text-xs leading-5 text-center border-b border-gray-100 dark:border-gray-700">
            @foreach ($post->tags as $tag)
                <span class="inline-flex items-center justify-center px-2 py-1 mr-1 font-bold leading-none uppercase bg-gray-900 rounded text-orange-50 dark:text-gray-300 dark:bg-gray-700">{{ $tag->name }}</span>
            @endforeach
        </div>--}}

        <article class="w-full mt-6 prose max-w-2xl lg:mt-10 dark:prose-invert prose-a:text-orange-500 prose-h1:text-4xl">
            @markdown($post->body)
        </article>

        <livewire:like :post="$post" />

        <div class="mt-4 pt-8">
            <script src="https://giscus.app/client.js"
                    data-repo="dsbilling/dsbilling.no"
                    data-repo-id="MDEwOlJlcG9zaXRvcnkzNTg2MDUzMTk="
                    data-category="Comments"
                    data-category-id="DIC_kwDOFV_iB84CTbW2"
                    data-mapping="pathname"
                    data-strict="0"
                    data-reactions-enabled="0"
                    data-emit-metadata="0"
                    data-input-position="bottom"
                    data-theme="dark_dimmed"
                    data-lang="en"
                    crossorigin="anonymous"
                    async>
            </script>
        </div>

    </div>
</x-guest-layout>
