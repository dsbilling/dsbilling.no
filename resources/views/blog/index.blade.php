<x-guest-layout>
	<div class="flex flex-col items-center">
		<div class="grid w-full grid-cols-1 gap-8">
			@forelse($posts as $post)
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