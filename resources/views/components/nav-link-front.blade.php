@props(['active'])

@php
$classes = ($active ?? false)
            ? 'px-3 py-2 transition-colors text-red-200 hover:text-red-400 focus:text-red-400 focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500 focus-visible:ring-opacity-60 focus-visible:outline-none focus:outline-none'
            : 'px-3 py-2 transition-colors text-gray-800 hover:text-red-400 focus:text-red-400 focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-blue-500 focus-visible:ring-opacity-60 focus-visible:outline-none focus:outline-none';
@endphp
    
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>