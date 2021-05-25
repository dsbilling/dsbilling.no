<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Certifications
        </h2>
    </x-slot>

    <div>
        <div class="max-w-6xl mx-auto py-10 overflow-hidden">
            <div class="block mb-8">
                <a href="{{ route('certifications.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add</a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            short
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            identifier
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            issued_at
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            expiration_at
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            company
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            file
                                        </th>
                                        <th scope="col" width="200" class="p-3 bg-gray-50">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($certifications as $certification)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{ $certification->id }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{ $certification->name }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{ $certification->short }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {!! $certification->identifier ?? '<span class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">Missing</span>' !!}
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{ $certification->issued_at->diffForHumans() }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{ $certification->expiration_at ? $certification->expiration_at->diffForHumans() : '' }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{ $certification->company->name ?? 'N/A' }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {!! (Storage::disk('public')->exists($certification->file_path)) ? '<i class="fas fa-file-pdf text-green-600"></i>' : '<i class="fas fa-file-pdf text-red-600"></i>' !!}
                                            </td>

                                            <td class="p-3 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('certifications.show', $certification->id) }}" class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">View</a>
                                                <a href="{{ route('certifications.edit', $certification->id) }}" class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded">Edit</a>
                                                <form class="inline-block" action="{{ route('certifications.destroy', $certification->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="bg-red-400 hover:bg-red-600 text-white font-bold py-1 px-2 rounded">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-3">
                {{ $certifications->links() }}
            </div>
        </div>
    </div>
</x-app-layout>