@props(['active'])

@php
$classes = ($active ?? false)
            ? 'relative block px-3 py-2 transition text-orange-500 dark:text-orange-400 font-bold'
            : 'relative block px-3 py-2 transition hover:text-orange-500 dark:hover:text-orange-400';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
    @if($active ?? false)
        <span class="absolute inset-x-1 -bottom-px h-px bg-orange-500"></span>
    @endif
</a>
