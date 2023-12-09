<div class="py-12">
    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form wire:submit="calculate">
                <div class="shadow overflow-hidden sm:rounded-md bg-white dark:bg-gray-800">
                    <div class="px-3 py-4 sm:px-6 sm:py-5">
                        <x-label for="width">Width in CM</x-jet-label>
                        <x-input id="width" type="number" wire:model.live="width" />
                        <x-input-error for="width" />
                    </div>
                    <div class="px-3 py-4 sm:px-6 sm:py-5">
                        <x-label for="length">Length in CM</x-jet-label>
                        <x-input id="length" type="number" wire:model.live="length" />
                        <x-input-error for="length" />
                    </div>
                    <div class="px-3 py-4 sm:px-6 sm:py-5">
                        <x-label for="depth">Depth in CM</x-jet-label>
                        <x-input id="depth" type="number" wire:model.live="depth" />
                        <x-input-error for="depth" />
                    </div>
                    <div class="px-3 py-4 sm:px-6 sm:py-5">
                        <x-label for="price">Price for each liter in KR</x-jet-label>
                        <x-input id="price" type="number" wire:model.live="price" step="0.01" min="0" max="10" />
                        <x-input-error for="price" />
                    </div>
                    @if(isset($volume) && isset($totalprice))
                        <div class="px-4 py-3 leading-normal text-blue-700 bg-blue-100 dark:bg-blue-900 dark:text-blue-200" role="alert">
                            Volume: {{ $volume }} liters<br>
                            Price: {{ $totalprice }}kr<br>
                            Price (-10%): {{ $totalprice * 0.9 }}kr
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
