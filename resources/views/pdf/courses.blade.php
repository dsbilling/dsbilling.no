<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/pdf.css') }}">
    </head>
    <body>
        <h2 class="mt-2">Courses</h2>
        @foreach ($courses as $course)
            <div class="my-2">
                <h4 class="text-sm">{{ $course->name }}@if($course->short), {{ $course->short }}@endif</h4>
                <h5 class="text-sm">{{ ucfirst($course->type) }} &mdash; {{ $course->company->name }}</h5>
                <h6>{{ $course->issued_at->toFormattedDateString() }}</h6>
            </div>
        @endforeach
    </body>
</html>