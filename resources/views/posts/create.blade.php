<x-app-layout>
	<x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('New Post') }}
        </h2>
    </x-slot>

	<div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
			<div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
				<div class="inline-block w-full p-6 overflow-hidden bg-white rounded-lg shadow dark:bg-gray-900">

					<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
						@csrf
						<div class="flex flex-wrap mb-6">
							<div class="w-full px-3 mb-6 md:w-3/5 md:mb-0">
								<label for="title" class="block mb-1 text-gray-700 dark:text-white">Title</label>
								<input id="title" name="title" type="text" class="w-full h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg dark:bg-black dark:text-white focus:shadow-outline" value="{{ old('title') }}">
								@error('title')
                                    <span class="text-xs text-red-700">{{ $message }}</span>
                                @enderror
							</div>
							<div class="w-full px-3 mb-6 md:w-1/5 md:mb-0">
								<label for="published_at" class="block mb-1 text-gray-700 dark:text-white">Published At</label>
								<input id="published_at" name="published_at" type="text" class="w-full h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg dark:bg-black dark:text-white focus:shadow-outline flatpickrSelector" value="{{ old('published_at') }}">
								@error('published_at')
                                    <span class="text-xs text-red-700">{{ $message }}</span>
                                @enderror
							</div>
							<div class="w-full px-3 mb-6 md:w-1/5 md:mb-0">
								<label for="draft" class="block mb-1 text-gray-700 dark:text-white">Draft?</label>
								<div class="relative inline-block w-full text-gray-700 dark:text-white">
									<select class="w-full h-10 pl-3 pr-6 text-base placeholder-gray-600 border rounded-lg appearance-none dark:bg-black focus:shadow-outline" id="draft" name="draft">
										<option value="1" {{ (old('draft') == "1") ? 'selected' : '' }}>Yes</option>
										<option value="0" {{ (old('draft') == "0") ? 'selected' : '' }}>No</option>
									</select>
									<div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
										<svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
									</div>
								</div>
								@error('draft')
                                    <span class="text-xs text-red-700">{{ $message }}</span>
                                @enderror
							</div>
						</div>
						<div class="flex flex-wrap">
							<div class="w-full px-3">
								<label for="grid-password" class="block mb-1 text-gray-700 dark:text-white">Post body</label>
								<textarea name="body" id="body">{{ old('body') }}</textarea>
								@error('body')
                                    <span class="text-xs text-red-700">{{ $message }}</span>
                                @enderror
							</div>
						</div>

						<div class="px-4 py-5 mb-6 sm:p-6">
                            <label for="tags" class="block text-sm font-medium text-gray-700 dark:text-white">Tags</label>
                            @foreach($tags as $tag)
                                <label class="inline-flex items-center m-2 text-gray-700 dark:text-white">
                                    <input class="text-orange-600 border-gray-300 rounded shadow-sm focus:border-orange-300 focus:ring focus:ring-offset-0 focus:ring-orange-200 focus:ring-opacity-50" type="checkbox" value="{{ $tag->name }}" name="tags[]" />
                                    <span class="ml-1">{{ $tag->name }}</span>
                                </label>
                            @endforeach
                            @error('tags')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

						<div class="flex items-center justify-end px-3 text-right">
                            <x-button>
                                {{ __('Save') }}
                            </x-button>
                        </div>
					</form>

				</div>
			</div>
		</div>
	</div>

</x-app-layout>
