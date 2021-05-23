<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('experiences.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('title', '') }}" />
                            @error('title')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="department" class="block font-medium text-sm text-gray-700">Department</label>
                            <input type="text" name="department" id="department" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('department', '') }}" />
                            @error('department')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="type" class="block font-medium text-sm text-gray-700">Type</label>
                            <select name="type" id="type" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                <option value="">-</option>
                                <option value="full-time" {{ ('full-time' == old('type')) ? ' selected' : '' }}>Full-time</option>
                                <option value="part-time" {{ ('part-time' == old('type')) ? ' selected' : '' }}>Part-time</option>
                                <option value="self-employed" {{ ('self-employed' == old('type')) ? ' selected' : '' }}>Self-employed</option>
                                <option value="freelance" {{ ('freelance' == old('type')) ? ' selected' : '' }}>Freelance</option>
                                <option value="contract" {{ ('contract' == old('type')) ? ' selected' : '' }}>Contract</option>
                                <option value="internship" {{ ('internship' == old('type')) ? ' selected' : '' }}>Internship</option>
                                <option value="apprenticeship" {{ ('apprenticeship' == old('type')) ? ' selected' : '' }}>Apprenticeship</option>
                                <option value="seasonal" {{ ('seasonal' == old('type')) ? ' selected' : '' }}>Seasonal</option>
                            </select>
                            @error('type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="started_at" class="block font-medium text-sm text-gray-700">Started at</label>
                            <input type="date" name="started_at" id="started_at" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('started_at', '') }}" />
                            @error('started_at')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="ended_at" class="block font-medium text-sm text-gray-700">Ended at</label>
                            <input type="date" name="ended_at" id="ended_at" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('ended_at', '') }}" max="{{ now()->toDateString() }}" />
                            @error('ended_at')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="company_id" class="block font-medium text-sm text-gray-700">Company</label>
                            <select name="company_id" id="company_id" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                <option value="">-</option>
                                @foreach($companies as $id => $company)
                                    <option value="{{ $id }}"{{ ($id == old('company_id', '')) ? ' selected' : '' }}>{{ $company }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>