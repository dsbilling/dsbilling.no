<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            Edit
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', $course->name) }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="short" class="block font-medium text-sm text-gray-700">Short</label>
                            <input type="text" name="short" id="short" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('short', $course->short) }}" />
                            @error('short')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="identifier" class="block font-medium text-sm text-gray-700">Type</label>
                            <select name="type" id="type" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                <option value="Interactive Online"{{ ("Interactive Online" == old('type', $course->type)) ? ' selected' : '' }}>Interactive Online</option>
                                <option value="Classroom"{{ ("Classroom" == old('type', $course->type)) ? ' selected' : '' }}>Classroom</option>
                                <option value="Online"{{ ("Online" == old('type', $course->type)) ? ' selected' : '' }}>Online</option>
                            </select>
                            @error('type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="issued_at" class="block font-medium text-sm text-gray-700">issued_at</label>
                            <input type="date" name="issued_at" id="issued_at" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('issued_at', $course->issued_at->toDateString()) }}" max="{{ now()->toDateString() }}" />
                            @error('issued_at')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="company_id" class="block font-medium text-sm text-gray-700">Company</label>
                            <select name="company_id" id="company_id" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                @foreach($companies as $company)
                                    <option value="{{ $company->id }}"{{ ($company->id == old('company_id', $course->company_id)) ? ' selected' : '' }}>{{ $company->name }}</option>
                                @endforeach
                            </select>
                            @error('company_id')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="file" class="block font-medium text-sm text-gray-700">File</label>
                            <input type="file" name="file" id="file" class="form-input rounded-md shadow-sm mt-1 block w-full" accept=".pdf" />
                            @if($course->file_path)<p class="text-sm text-yellow-600 py-2"><i class="fas fa-exclamation-triangle"></i> Uploading a new file will delete the previous.</p>@endif
                            @error('file')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="tags" class="block font-medium text-sm text-gray-700">Tags</label>
                            @foreach($tags as $tag)
                                <label class="inline-flex items-center text-gray-700 m-2">
                                    <input class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50" type="checkbox" value="{{ $tag->name }}" name="tags[]" {{ ($course->tags->contains('name', $tag->name)) ? ' checked' : '' }} />
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