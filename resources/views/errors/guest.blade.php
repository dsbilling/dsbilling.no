<x-guest-layout>
    <div class="hidden">
        @yield('title')
    </div>
    <div class="w-full m-auto text-center">
        <x-gradient-text class="text-4xl">@yield('code')</x-gradient-text>
        <p class="text-gray-400">@yield('message')</p>
    </div>
</x-guest-layout>