<x-guest-layout>
	@if(!$posts->isEmpty())
		<div class="mb-8">
			<h2 class="text-xl font-bold text-gray-800 dark:text-gray-200">Recent Posts</h2>
			<h4 class="mt-2 text-gray-500 dark:text-gray-400 text-md">My thoughts on what I'm building and learning.</h4>
		</div>
	@endif
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
            @if(!$posts->isEmpty())
                {!! $posts->links() !!}
            @endif
		</div>
	</div>
</x-guest-layout>
