<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timeline') }}
        </h2>
    </x-slot>

    <div class="pt-12 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('My timeline') }}
        </h2>
        <div class="relative wrap overflow-hidden p-10 h-full">
            <div class="border-2-2 absolute border-opacity-20 border-gray-500 h-full border" style="left: 50%"></div>

            @foreach ($experiences as $experience)
                <div class="mb-8 flex justify-between @if ($loop->odd) flex-row-reverse @endif items-center w-full left-timeline">
                    <div class="order-1 w-5/12"></div>
                    <div class="z-20 flex items-center order-1 @if ($loop->odd) bg-gray-700 @else bg-gray-800 @endif shadow-xl py-1 px-2 rounded-full">
                        <h1 class="mx-auto text-white font-semibold text-lg">{{ $experience->ended_at ? $experience->ended_at->isoFormat('MMM Y') : 'now' }}</h1>
                    </div>
                    <div class="order-1 @if ($loop->odd) bg-gray-700 @else bg-gray-800 @endif  text-white rounded-lg shadow-xl w-5/12 px-6 py-4">
                        <h3 class="mb-3 font-bold text-xl">{{ $experience->title }}@if($experience->department), <span class="text-gray-300">{{ $experience->department }}</span>@endif</h3>
                        <h5 class="mb-3 font-bold">{{ ucfirst($experience->type) }} <span class="text-gray-300">{{ __('at') }}</span> {{ $experience->company->name }}</h5>
                        <h6 class="font-bold">{{ $experience->started_at->isoFormat('MMMM Y') }} &mdash; {{ $experience->ended_at ? $experience->ended_at->isoFormat('MMMM Y') : 'now' }}</h6>
                        @if($experience->description)<p class="mt-3 text-sm font-medium leading-snug tracking-wide text-white text-opacity-100">{{ $experience->description }}</p>@endif
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
