<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
    </head>
    <body>
        <h2>Experiences</h2>
        @foreach ($experiences as $experience)
            <div class="my-2">
                <h4 class="text-sm">{{ $experience->title }}@if($experience->department), {{ $experience->department }}@endif</h4>
                <h5 class="text-xs">{{ ucfirst($experience->type) }} {{ __('at') }} {{ $experience->company->name }}</h5>
                <h6>{{ $experience->started_at->isoFormat('MMMM Y') }} &mdash; {{ $experience->ended_at ? $experience->ended_at->isoFormat('MMMM Y') : 'now' }}</h6>
                @if($experience->description)<p class="mt-2 text-xs">{{ $experience->description }}</p>@endif
            </div>
        @endforeach

        <h2 class="mt-6">Certifications</h2>
        @foreach ($certifications as $certification)
            <div class="my-2">
                <h4 class="text-sm">{{ $certification->name }}@if($certification->short), {{ $certification->short }}@endif</h4>
                <h5 class="text-xs">{{ $certification->identifier ?? '-' }}</h5>
                <h6>{{ $certification->issued_at->toFormattedDateString() }} @if($certification->expiration_at)&mdash; {{ $certification->expiration_at->toFormattedDateString() }}@endif</h6>
            </div>
        @endforeach
        <p class="mt-6 text-xs">And I have taken {{ $courses }} other courses.</p>

    </body>
</html>