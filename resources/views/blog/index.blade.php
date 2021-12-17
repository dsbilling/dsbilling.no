<x-guest-layout>
	<div class="flex flex-col items-center">
		<div class="grid w-full grid-cols-1 gap-8">
			@forelse($posts as $post)
				<div class="m-auto overflow-hidden rounded-lg shadow-lg cursor-pointer group">
					<a href="{{ route('blog.show', $post->slug) }}" class="block w-full h-full">
						{{--<img alt="blog photo" src="{{ asset('img/daniel.jpg') }}" class="object-cover w-full max-h-28"/>--}}
						<div class="w-full p-4 bg-white dark:bg-gray-800 hover:dark:bg-gray-700">
							<p class="text-sm font-medium text-orange-400">
								{{ $post->user->name }} &middot; {{ now()->subMonth(1) > $post->published_at ? $post->published_at->isoFormat('D MMMM YYYY') : $post->published_at->diffForHumans() }} &middot; {{ read_time($post->body)}} &middot;  {{ App\Helpers\NumberHelper::nearestK(views($post)->count()) }} {{ Str::plural('view', views($post)->count()) }}
							</p>
							<p class="my-2 text-2xl font-semibold text-gray-800 sm:text-3xl dark:text-white">
								{{ $post->title }}
							</p>
							<p class="text-sm font-light text-gray-400 dark:text-gray-300">
								{!! strip_tags(Str::of(Str::limit($post->body, 500))->markdown()) !!}
							</p>
						</div>
					</a>
				</div>
				{!! $posts->links() !!}
			@empty
				<div class="w-full m-auto text-center">
					<x-gradient-text>{{ \Illuminate\Foundation\Inspiring::quote() }}</x-gradient-text>
				</div>
			@endforelse
		</div>
	</div>
</x-guest-layout>