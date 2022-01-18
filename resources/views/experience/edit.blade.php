<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Edit
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('experiences.update', $experience->id) }}">
                    @csrf
                    @method('put')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="title" class="block font-medium text-sm text-gray-700">Title</label>
                            <input type="text" name="title" id="title" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('title', $experience->title) }}" />
                            @error('title')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="department" class="block font-medium text-sm text-gray-700">Department</label>
                            <input type="text" name="department" id="department" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('department', $experience->department) }}" />
                            @error('department')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="type" class="block font-medium text-sm text-gray-700">Type</label>
                            <select name="type" id="type" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                <option value="">-</option>
                                <option value="full-time" {{ ('full-time' == old('type', $experience->type)) ? ' selected' : '' }}>Full-time</option>
                                <option value="part-time" {{ ('part-time' == old('type', $experience->type)) ? ' selected' : '' }}>Part-time</option>
                                <option value="self-employed" {{ ('self-employed' == old('type', $experience->type)) ? ' selected' : '' }}>Self-employed</option>
                                <option value="freelance" {{ ('freelance' == old('type', $experience->type)) ? ' selected' : '' }}>Freelance</option>
                                <option value="contract" {{ ('contract' == old('type', $experience->type)) ? ' selected' : '' }}>Contract</option>
                                <option value="internship" {{ ('internship' == old('type', $experience->type)) ? ' selected' : '' }}>Internship</option>
                                <option value="apprenticeship" {{ ('apprenticeship' == old('type', $experience->type)) ? ' selected' : '' }}>Apprenticeship</option>
                                <option value="seasonal" {{ ('seasonal' == old('type', $experience->type)) ? ' selected' : '' }}>Seasonal</option>
                            </select>
                            @error('type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
                            <textarea type="text" name="description" id="description" class="form-input rounded-md shadow-sm mt-1 block w-full">{{ old('description', $experience->description) }}</textarea>
                            @error('description')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="started_at" class="block font-medium text-sm text-gray-700">Started at</label>
                            <input type="date" name="started_at" id="started_at" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('started_at', $experience->started_at->toDateString()) }}" />
                            @error('started_at')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="ended_at" class="block font-medium text-sm text-gray-700">Ended at</label>
                            <input type="date" name="ended_at" id="ended_at" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ ($experience->ended_at) ? $experience->ended_at->toDateString() : old('ended_at') }}" max="{{ now()->toDateString() }}" />
                            @error('ended_at')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="company_id" class="block font-medium text-sm text-gray-700">Company</label>
                            <select name="company_id" id="company_id" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}"{{ ($company->id == old('company_id', $experience->company_id)) ? ' selected' : '' }}>{{ $company->name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="tags" class="block font-medium text-sm text-gray-700">Tags</label>
                            @foreach($tags as $tag)
                                <label class="inline-flex items-center text-gray-700 m-2">
                                    <input class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" type="checkbox" value="{{ $tag->name }}" name="tags[]" {{ ($experience->tags->contains('name', $tag->name)) ? ' checked' : '' }} />
                                    <span class="ml-1">{{ $tag->name }}</span>
                                </label>
                            @endforeach
                            @error('tags')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>