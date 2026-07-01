@php use Illuminate\Foundation\Inspiring; @endphp
<x-guest-layout>
    <section id="blog" class="mx-auto max-w-2xl lg:max-w-5xl">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-50 lg:text-4xl">
            <x-gradient-text>Projects</x-gradient-text>
            <span class="mt-2 text-sm text-gray-500 dark:text-gray-400">A collection of projects I have worked on in the years.</span>
        </h1>
        <div class="mt-16 sm:mt-20">
            <ul role="list" class="grid grid-cols-1 gap-x-6 gap-y-8 lg:grid-cols-2">
                @forelse($projects as $project)
                    <li class="overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 dark:bg-gray-800">
                        <a href="{{ route('projects.show', $project->slug) }}"
                            class="flex items-center gap-x-4 border-b border-gray-900/5 bg-gray-100 p-6 dark:bg-gray-900">
                            <img src="{{ $project->logo_url }}" alt="{{ $project->title }}"
                                 class="h-12 w-12 flex-none rounded-lg bg-white object-cover ring-1 ring-gray-200/10">
                            <div
                                class="text-lg font-bold leading-6 text-gray-900 dark:text-gray-200">{{ $project->title }}</div>
                        </a>
                        <dl class="-my-3 divide-y divide-gray-100 dark:divide-gray-700 px-6 py-4 text-sm leading-6">
                            <div class="flex justify-between gap-x-4 py-3">
                                <dt class="text-gray-500 dark:text-gray-300">Started</dt>
                                <dd class="text-gray-700 dark:text-gray-200">
                                    <time
                                        datetime="{{ $project->start_date }}">{{ $project->start_date->isoFormat('LL') }}</time>
                                </dd>
                            </div>
                            @if($project->end_date)
                                <div class="flex justify-between gap-x-4 py-3">
                                    <dt class="text-gray-500 dark:text-gray-300">Ended</dt>
                                    <dd class="text-gray-700 dark:text-gray-200">
                                        <time
                                            datetime="{{ $project->end_date }}">{{ $project->end_date->isoFormat('LL') }}</time>
                                    </dd>
                                </div>
                            @endif
                            <div class="flex justify-between gap-x-4 py-3">
                                <dt class="text-gray-500 dark:text-gray-300">Status</dt>
                                <dd class="text-gray-700 dark:text-gray-200">
                                    {{ $project->status }}
                                </dd>
                            </div>
                        </dl>
                        <div class="border-t border-gray-200 dark:bg-gray-900 dark:border-gray-700">
                            <div class="-mt-px flex divide-x divide-gray-200 dark:divide-gray-700">
                                @if($project->repository)
                                    <div class="flex w-0 flex-1">
                                        <a href="{{ $project->repository }}"
                                           class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-1 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 256 256"><path d="M208.31,75.68A59.78,59.78,0,0,0,202.93,28,8,8,0,0,0,196,24a59.75,59.75,0,0,0-48,24H124A59.75,59.75,0,0,0,76,24a8,8,0,0,0-6.93,4,59.78,59.78,0,0,0-5.38,47.68A58.14,58.14,0,0,0,56,104v8a56.06,56.06,0,0,0,48.44,55.47A39.8,39.8,0,0,0,96,192v8H72a24,24,0,0,1-24-24A40,40,0,0,0,8,136a8,8,0,0,0,0,16,24,24,0,0,1,24,24,40,40,0,0,0,40,40H96v16a8,8,0,0,0,16,0V192a24,24,0,0,1,48,0v40a8,8,0,0,0,16,0V192a39.8,39.8,0,0,0-8.44-24.53A56.06,56.06,0,0,0,216,112v-8A58.14,58.14,0,0,0,208.31,75.68ZM200,112a40,40,0,0,1-40,40H112a40,40,0,0,1-40-40v-8a41.74,41.74,0,0,1,6.9-22.48A8,8,0,0,0,80,73.83a43.81,43.81,0,0,1,.79-33.58,43.88,43.88,0,0,1,32.32,20.06A8,8,0,0,0,119.82,64h32.35a8,8,0,0,0,6.74-3.69,43.87,43.87,0,0,1,32.32-20.06A43.81,43.81,0,0,1,192,73.83a8.09,8.09,0,0,0,1,7.65A41.72,41.72,0,0,1,200,104Z"></path></svg>
                                            Repository
                                        </a>
                                    </div>
                                @endif
                                @if($project->website)
                                    <div class="flex w-0 flex-1">
                                        <a href="{{ $project->website }}"
                                           class="relative inline-flex w-0 flex-1 items-center justify-center gap-x-1 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 256 256"><path d="M216,40H40A16,16,0,0,0,24,56V200a16,16,0,0,0,16,16H216a16,16,0,0,0,16-16V56A16,16,0,0,0,216,40Zm0,16V88H40V56Zm0,144H40V104H216v96Z"></path></svg>
                                            Website
                                        </a>
                                    </div>
                                @endif
                                <div class="flex w-0 flex-1">
                                    <a href="{{ route('projects.show', $project->slug) }}"
                                       class="relative -mr-px inline-flex w-0 flex-1 items-center justify-center gap-x-1 rounded-bl-lg border border-transparent py-4 text-sm font-semibold text-gray-900 hover:text-gray-600 dark:text-gray-200 dark:hover:text-gray-400">
                                        Read More
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 256 256"><path d="M221.66,133.66l-72,72a8,8,0,0,1-11.32-11.32L196.69,136H40a8,8,0,0,1,0-16H196.69L138.34,61.66a8,8,0,0,1,11.32-11.32l72,72A8,8,0,0,1,221.66,133.66Z"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                @empty
                    <div class="w-full m-auto text-center">
                        <x-gradient-text>{!! Inspiring::quote() !!}</x-gradient-text>
                    </div>
                @endforelse
            </ul>
        </div>
        @if(!$projects->isEmpty())
            <div class="mt-8 w-full m-auto">
                {!! $projects->links() !!}
            </div>
        @endif
    </section>
</x-guest-layout>
