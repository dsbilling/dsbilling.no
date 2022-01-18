<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Manage User') }} - {{ $user->name }}
        </h2>
    </x-slot>
    <form method="POST" action="{{ route('users.update', $user) }}">
        @csrf
        @method("PUT")
        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                    <div class="space-y-10">
                        <div class="px-4 py-5 bg-white shadow sm:p-6 sm:rounded-lg">
                            <div class="space-y-6">
                                @foreach ($roles as $role)
                                    <div class="flex items-center justify-between">
                                        <label class="flex items-center">
                                            <input name="roles[]" type="checkbox" class="form-checkbox" value="{{ $role->name }}" {{ $user->getRoleNames()->contains($role->name) ? "checked='checked'":"" }}>
                                            <span class="ml-2 text-sm text-gray-600">{{ $role->name }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-end px-4 py-3 text-right bg-gray-50 sm:px-6">
                        <button type="submit" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25">
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-app-layout>