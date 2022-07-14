<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Liter Calculator') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('liter-calculator.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="bredde" class="block font-medium text-sm text-gray-700">Bredde i CM</label>
                            <input type="text" name="bredde" id="bredde" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('bredde', '') }}" />
                            @error('bredde')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="lengde" class="block font-medium text-sm text-gray-700">Lengde i CM</label>
                            <input type="text" name="lengde" id="lengde" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('lengde', '') }}" />
                            @error('lengde')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="tykkelse" class="block font-medium text-sm text-gray-700">Tykkelse i CM</label>
                            <input type="text" name="tykkelse" id="tykkelse" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('tykkelse', '') }}" />
                            @error('tykkelse')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="pris" class="block font-medium text-sm text-gray-700">Pris per liter i KR</label>
                            <input type="text" name="pris" id="pris" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('pris', '') }}" />
                            @error('pris')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        @if(isset($liters) && isset($totalprice))
                            <div class="px-4 py-3 leading-normal text-blue-700 bg-blue-100" role="alert">
                                Volume: {{ $liters }} liter<br>
                                Pris: {{ $totalprice }}kr<br>
                                Pris (-10%): {{ $totalprice * 0.9 }}kr
                            </div>
                        @endif
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Calculate
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
