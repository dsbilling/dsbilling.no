<x-guest-layout>
    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-50 lg:text-4xl">
        <x-gradient-text>Blog</x-gradient-text>
    </h1>
	<div class="flex flex-col items-center">
		<div class="grid gap-4 pt-8 sm:gap-6 md:grid-cols-2 w-full">
			@forelse($posts as $post)
				<div class="w-full h-full m-auto overflow-hidden border border-gray-200 rounded-lg shadow-lg cursor-pointer bg-gray-50/50 hover:bg-gray-50 dark:border-gray-700 group dark:bg-gray-800/50 hover:dark:bg-gray-800 dark:shadow-gray-100/10">
					<a href="{{ route('blog.show', $post->slug) }}" class="block w-full h-full">
						{{--<img alt="blog photo" src="{{ asset('img/daniel.jpg') }}" class="object-cover w-full max-h-28"/>--}}
						<div class="w-full p-4 ">
							<p class="text-sm font-medium text-orange-500 dark:text-orange-400">
								{{ now()->subMonth(1) > $post->published_at ? $post->published_at->isoFormat('D. MMMM YYYY') : $post->published_at->diffForHumans() }} &middot; {{ read_time($post->body)}} &middot;  {{ App\Helpers\NumberHelper::nearestK(views($post)->count()) }} {{ Str::plural('view', views($post)->count()) }} &middot; {{ $post->likes_count }} {{ Str::plural('like', $post->likes_count) }}
							</p>
							<p class="my-2 text-2xl font-semibold text-gray-800 sm:text-3xl dark:text-white">
								{{ $post->title }}
							</p>
							<p class="text-sm font-light text-gray-500 dark:text-gray-300">
								{!! strip_tags(Str::of(Str::limit($post->body, 500))->markdown()) !!}
							</p>
						</div>
					</a>
				</div>
			@empty
				<div class="w-full m-auto text-center">
					<x-gradient-text>{{ \Illuminate\Foundation\Inspiring::quote() }}</x-gradient-text>
				</div>
			@endforelse
		</div>
	</div>
    @if(!$posts->isEmpty())
        <div class="mt-8 w-full m-auto">
            {!! $posts->links() !!}
        </div>
    @endif
</x-guest-layout>
