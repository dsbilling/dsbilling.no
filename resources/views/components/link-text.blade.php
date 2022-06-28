@props(['noreferrer', 'link'])

@php
    $ref = ($noreferrer ?? false)
                ? 'noreferrer'
                : 'external';
@endphp

<a href="{{ $link }}" class="font-bold transition-colors rounded hover:underline hover:text-yellow-500 focus:text-red-500 focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-red-500 focus-visible:ring-opacity-60 focus-visible:outline-none focus:outline-none" rel="{{ $ref }}" target="blank">{{ $slot }}</a>
