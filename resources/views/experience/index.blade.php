<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            Experiences
        </h2>
    </x-slot>

    <div>
        <div class="px-4 py-10 mx-auto overflow-hidden max-w-7xl sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('experiences.create') }}" class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700">Add</a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                        <div class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" width="50" class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                            title
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                            department
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                            type
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                            started_at
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                            ended_at
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                            company
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">
                                            tags
                                        </th>
                                        <th scope="col" width="200" class="p-3 bg-gray-50">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($experiences as $experience)
                                        <tr>
                                            <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap">
                                                {{ $experience->id }}
                                            </td>

                                            <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap">
                                                {{ $experience->title }}
                                            </td>

                                            <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap">
                                                {{ $experience->department }}
                                            </td>

                                            <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap">
                                                {{ $experience->type }}
                                            </td>

                                            <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap">
                                                {{ $experience->started_at->diffForHumans() }}
                                            </td>

                                            <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap">
                                                {{ $experience->ended_at ? $experience->ended_at->diffForHumans() : '' }}
                                            </td>

                                            <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap">
                                                {{ $experience->company->name ?? 'N/A' }}
                                            </td>

                                            <td class="px-6 py-4 text-sm font-medium leading-5 text-gray-900 whitespace-no-wrap">
                                                {{ $experience->tags->count() }}
                                            </td>

                                            <td class="p-3 text-sm font-medium whitespace-nowrap">
                                                <a href="{{ route('experiences.show', $experience->id) }}" class="px-2 py-1 font-bold text-white bg-blue-400 rounded hover:bg-blue-600">View</a>
                                                <a href="{{ route('experiences.edit', $experience->id) }}" class="px-2 py-1 font-bold text-white bg-yellow-400 rounded hover:bg-yellow-600">Edit</a>
                                                <form class="inline-block" action="{{ route('experiences.destroy', $experience->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="px-2 py-1 font-bold text-white bg-red-400 rounded hover:bg-red-600">Delete</button>
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
                {{ $experiences->links() }}
            </div>
        </div>
    </div>
</x-app-layout>