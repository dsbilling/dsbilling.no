<x-guest-layout>
    <div class="hidden">
        @yield('title')
    </div>
    <div class="w-full m-auto text-center">
        <p class="text-6xl"><x-gradient-text>@yield('code')</x-gradient-text></p>
        <p class="text-gray-400">@yield('message')</p>
    </div>
</x-guest-layout>