@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block px-3 py-2 text-base font-medium text-red-400 rounded-md hover:text-gray-800 hover:bg-gray-100 dark:hover:bg-gray-800 dark:hover:text-gray-100'
            : 'block px-3 py-2 text-base font-medium text-gray-800 dark:text-gray-100 rounded-md hover:text-red-400 hover:bg-gray-100 dark:hover:bg-orange-400/10 dark:hover:text-orange-100';
@endphp
    
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>