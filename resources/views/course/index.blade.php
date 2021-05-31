<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Courses
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8 overflow-hidden">
            <div class="block mb-8">
                <a href="{{ route('courses.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add</a>
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
                                            type
                                        </th>
                                        <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                            issued_at
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
                                    @foreach ($courses as $course)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{ $course->id }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{ $course->name }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{ $course->short }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{ $course->type }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{ $course->issued_at->diffForHumans() }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {{ $course->company->name }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                                {!! (Storage::disk('public')->exists($course->file_path)) ? '<i class="fas fa-file-pdf text-green-600"></i>' : '<i class="fas fa-file-pdf text-red-600"></i>' !!}
                                            </td>

                                            <td class="p-3 whitespace-nowrap text-sm font-medium">
                                                <a href="{{ route('courses.show', $course->id) }}" class="bg-blue-400 hover:bg-blue-600 text-white font-bold py-1 px-2 rounded">View</a>
                                                <a href="{{ route('courses.edit', $course->id) }}" class="bg-yellow-400 hover:bg-yellow-600 text-white font-bold py-1 px-2 rounded">Edit</a>
                                                <form class="inline-block" action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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
                {{ $courses->links() }}
            </div>
        </div>
    </div>
</x-app-layout>