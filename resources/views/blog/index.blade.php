@php use Illuminate\Foundation\Inspiring; @endphp
<x-guest-layout>
    <section id="blog" class="mx-auto max-w-2xl lg:max-w-5xl">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-50 lg:text-4xl">
            <x-gradient-text>Blog</x-gradient-text>
            <span class="mt-2 text-sm text-gray-500 dark:text-gray-400">A collection of my thoughts and writings.</span>
        </h1>
        <div class="mt-16 sm:mt-20">
            <div class="md:border-l md:border-orange-200 md:pl-6 md:dark:border-orange-700/40">
                <div class="flex max-w-3xl flex-col space-y-16">
                    @forelse($posts as $post)
                        <article class="md:grid md:grid-cols-4 md:items-baseline">
                            <div class="md:col-span-3 group relative flex flex-col items-start">
                                <time
                                    class="md:hidden relative z-10 order-first mb-3 flex items-center text-sm text-orange-500 dark:text-orange-500 pl-3.5"
                                    datetime="2022-09-05"><span class="absolute inset-y-0 left-0 flex items-center"
                                                                aria-hidden="true"><span
                                            class="h-4 w-0.5 rounded-full bg-orange-200 dark:bg-orange-500"></span></span>{{ now()->subMonth(1) > $post->published_at ? $post->published_at->isoFormat('D. MMMM YYYY') : $post->published_at->diffForHumans() }}
                                </time>
                                <h2 class="text-2xl font-semibold tracking-tight text-slate-800 dark:text-slate-100 hover:text-orange-500">
                                    <span
                                        class="absolute -inset-x-4 -inset-y-6 z-0 scale-95 bg-slate-100 opacity-0 transition group-hover:scale-100 group-hover:opacity-100 dark:bg-slate-800/50 sm:-inset-x-6 sm:rounded-2xl"></span>
                                    <a href="{{ route('blog.show', $post->slug) }}"><span
                                            class="absolute -inset-x-4 -inset-y-6 z-20 sm:-inset-x-6 sm:rounded-2xl"></span><span
                                            class="relative z-10">{{ $post->title }}</span></a>
                                </h2>
                                <p class="relative z-10 mt-2 text-sm text-slate-600 dark:text-slate-300">{!! strip_tags(Str::of(Str::limit($post->body, 500))->markdown()) !!}</p>
                                <p class="relative z-10 mt-4 text-slate-600 dark:text-slate-400 text-xs">
                                    {{ read_time($post->body)}} &middot;  {{ App\Helpers\NumberHelper::nearestK(views($post)->count()) }} {{ Str::plural('view', views($post)->count()) }} &middot; {{ $post->likes_count }} {{ Str::plural('like', $post->likes_count) }}
                                </p>
                            </div>
                            <time
                                class="mt-1 hidden md:block relative z-10 order-first mb-3 items-center text-sm text-orange-500 dark:text-orange-500"
                                datetime="2022-09-05">{{ now()->subMonth(1) > $post->published_at ? $post->published_at->isoFormat('D. MMMM YYYY') : $post->published_at->diffForHumans() }}
                            </time>
                        </article>
                    @empty
                        <div class="w-full m-auto text-center">
                            <x-gradient-text>{!! Inspiring::quote() !!}</x-gradient-text>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
        @if(!$posts->isEmpty())
            <div class="mt-8 w-full m-auto">
                {!! $posts->links() !!}
            </div>
        @endif
    </section>
</x-guest-layout>
