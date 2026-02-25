<x-layout :header="true" :title="'My Projects'">
    <x-header type="sidebar" />

    <div class="mb-6 flex items-center justify-between">
        <a href="{{ route("projects.index") }}" class="text-2xl font-bold text-gray-900 underline decoration-transparent hover:decoration-gray-800 transition duration-150">Projects &#8599;</a>
        <a href="{{ route('projects.create') }}" class="px-4 py-2 bg-gray-900 text-white text-sm font-medium hover:bg-gray-800 transition-colors duration-150">
            + New Project
        </a>
    </div>
    <hr class="border-gray-300 mb-6">

    @if($projects->isEmpty())
    <p class="text-gray-500">You haven't uploaded any projects yet.</p>
    @else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($projects as $project)
        <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
            <div class="flex items-start justify-between mb-2">
                <a href="{{ route('projects.show', $project) }}" class="text-lg font-semibold text-gray-900 underline decoration-transparent hover:decoration-gray-800 transition duration-150">{{ $project->name }}</a>
                <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-600 ml-2 whitespace-nowrap">{{ $project->status }}</span>
            </div>
            <p class="text-gray-500 text-sm line-clamp-2 mb-3">{{ $project->description }}</p>
            <div class="flex gap-2 mt-3">
                <a href="{{ route('projects.edit', $project) }}" class="text-xs px-2 py-1 bg-gray-900 text-white rounded hover:bg-gray-800 transition duration-150">Edit</a>
                <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('Delete this project?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="cursor-pointer text-xs px-2 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition duration-150">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</x-layout>