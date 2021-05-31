<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', '') }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="short" class="block font-medium text-sm text-gray-700">Short</label>
                            <input type="text" name="short" id="short" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('short', '') }}" />
                            @error('short')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="type" class="block font-medium text-sm text-gray-700">Type</label>
                            <select name="type" id="type" class="form-multiselect block rounded-md shadow-sm mt-1 block w-full">
                                <option value="">-</option>
                                <option value="Interactive Online"{{ ("Interactive Online" == old('type')) ? ' selected' : '' }}>Interactive Online</option>
                                <option value="Classroom"{{ ("Classroom" == old('type')) ? ' selected' : '' }}>Classroom</option>
                                <option value="Online"{{ ("Online" == old('type')) ? ' selected' : '' }}>Online</option>
                            </select>
                            @error('type')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="issued_at" class="block font-medium text-sm text-gray-700">issued_at</label>
                            <input type="date" name="issued_at" id="issued_at" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('issued_at', '') }}"  max="{{ now()->toDateString() }}" />
                            @error('issued_at')
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
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="file" class="block font-medium text-sm text-gray-700">File</label>
                            <input type="file" name="file" id="file" class="form-input rounded-md shadow-sm mt-1 block w-full" accept=".pdf" />
                            @error('file')
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