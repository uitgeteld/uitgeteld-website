<x-layout :header="true" :footer="true">
    <x-header type="sidebar">
        <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Home</a>
        <a href="{{ route('projects.user') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Projects</a>
        @if(Auth::user() && Auth::user()->is_admin)
        <a href="{{ route('users.index') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Users</a>
        @endif
        <a href="{{ route('profile.show') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Profile</a>
    </x-header>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Manage Tree Link</h1>
    </div>
    <hr class="border-gray-300 mb-6">

    <div class="max-w-2xl mx-auto px-4 py-4 space-y-6 mb-10">

        @if(session('status') === 'link-added')
        <div class="p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
            Link added successfully.
        </div>
        @endif

        @if(session('status') === 'link-deleted')
        <div class="p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
            Link deleted successfully.
        </div>
        @endif

        @if(session('status') === 'link-updated')
        <div class="p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
            Link updated successfully.
        </div>
        @endif

        @if(session('status') === 'tree-updated')
        <div class="p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
            Tree settings saved.
        </div>
        @endif

        <div class="bg-white p-6 rounded-lg border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Tree Settings</h2>

            <form action="{{ route('tree.update') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <input type="text" name="description" id="description" value="{{ old('description', $tree->description) }}"
                        placeholder="e.g. developer &amp; artist"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                </div>

                <div>
                    <label for="style" class="block text-sm font-medium text-gray-700 mb-2">Style</label>
                    <select name="style" id="style"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:border-gray-400 cursor-pointer">
                        <option value="coding" {{ old('style', $tree->style) === 'coding' ? 'selected' : '' }}>Coding</option>
                        <option value="simple" {{ old('style', $tree->style) === 'simple' ? 'selected' : '' }}>Simple</option>
                    </select>
                </div>

                <div>
                    <label for="theme" class="block text-sm font-medium text-gray-700 mb-2">Theme</label>
                    <select name="theme" id="theme"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:border-gray-400 cursor-pointer">
                        <option value="0" {{ (int) old('theme', $tree->theme) === 0 ? 'selected' : '' }}>Switch (let visitor choose)</option>
                        <option value="1" {{ (int) old('theme', $tree->theme) === 1 ? 'selected' : '' }}>Always Light</option>
                        <option value="2" {{ (int) old('theme', $tree->theme) === 2 ? 'selected' : '' }}>Always Dark</option>
                    </select>
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" class="px-6 py-2 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition-colors cursor-pointer">
                        Save
                    </button>

                    <form action="{{ route('tree.deactivate') }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700 transition-colors cursor-pointer">
                            Deactivate Tree
                        </button>
                    </form>
                </div>
            </form>
        </div>

        <div class="bg-white p-6 rounded-lg border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Add a Link</h2>

            <form action="{{ route('links.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Label</label>
                    <input type="text" name="content" id="content" value="{{ old('content') }}" required placeholder="e.g. My GitHub"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                </div>

                <div>
                    <label for="url" class="block text-sm font-medium text-gray-700 mb-2">URL</label>
                    <input type="url" name="url" id="url" value="{{ old('url') }}" required placeholder="https://..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                </div>

                <div>
                    <label for="color" class="block text-sm font-medium text-gray-700 mb-2">Button Color</label>
                    <div class="flex items-center gap-3">
                        <input type="color" name="color" id="color" value="{{ old('color', '#000000') }}"
                            class="h-10 w-16 rounded border border-gray-300 cursor-pointer">
                        <span class="text-sm text-gray-500">Pick a background color for the button</span>
                    </div>
                </div>

                @if ($errors->any())
                <div class="p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <button type="submit" class="px-6 py-2 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition-colors cursor-pointer">
                    Add Link
                </button>
            </form>
        </div>

        <div class="bg-white p-6 rounded-lg border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Your Links</h2>

            @if($tree->links->isEmpty())
            <p class="text-sm text-gray-500">No links yet. Add one above.</p>
            @else
            <ul class="space-y-3" id="sortable-links">
                @foreach($tree->links as $link)
                <li class="border border-gray-200 rounded-lg overflow-hidden" id="link-{{ $link->id }}" data-id="{{ $link->id }}">

                    <div class="link-display flex items-center gap-3 p-3">
                        <div class="drag-handle cursor-grab text-gray-300 hover:text-gray-500 shrink-0 px-1" title="Drag to reorder">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                            </svg>
                        </div>
                        <div class="flex items-center gap-3 min-w-0 flex-1">
                            <span class="inline-block w-4 h-4 rounded-full shrink-0" style="background-color: {{ $link->color }}"></span>
                            <div class="min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $link->content }}</p>
                                <a href="{{ $link->url }}" target="_blank" class="text-xs text-gray-500 hover:underline truncate block">{{ $link->url }}</a>
                            </div>
                        </div>
                        <div class="flex gap-2 shrink-0">
                            <button type="button" onclick="toggleEdit({{ $link->id }})"
                                class="px-3 py-1 text-sm text-blue-600 border border-blue-200 rounded-lg hover:bg-blue-50 transition-colors cursor-pointer">
                                Edit
                            </button>
                            <form action="{{ route('links.destroy', $link->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 text-sm text-red-600 border border-red-200 rounded-lg hover:bg-red-50 transition-colors cursor-pointer">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <form action="{{ route('links.update', $link->id) }}" method="POST"
                        class="link-edit hidden border-t border-gray-200 p-3 space-y-3">
                        @csrf
                        @method('PUT')
                        <div class="flex gap-3">
                            <div class="flex-1">
                                <input type="text" name="content" value="{{ $link->content }}" required placeholder="Label"
                                    class="w-full px-3 py-1.5 border border-gray-300 rounded-lg text-sm text-gray-900 focus:outline-none focus:border-gray-400">
                            </div>
                            <div class="flex-1">
                                <input type="url" name="url" value="{{ $link->url }}" required placeholder="https://..."
                                    class="w-full px-3 py-1.5 border border-gray-300 rounded-lg text-sm text-gray-900 focus:outline-none focus:border-gray-400">
                            </div>
                            <input type="color" name="color" value="{{ $link->color }}"
                                class="h-9 w-12 rounded border border-gray-300 cursor-pointer shrink-0">
                        </div>
                        <div class="flex gap-2">
                            <button type="submit" class="px-3 py-1 text-sm text-white bg-gray-900 rounded-lg hover:bg-gray-800 transition-colors cursor-pointer">
                                Save
                            </button>
                            <button type="button" onclick="toggleEdit({{ $link->id }})"
                                class="px-3 py-1 text-sm text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors cursor-pointer">
                                Cancel
                            </button>
                        </div>
                    </form>

                </li>
                @endforeach
            </ul>
            @endif
        </div>

    </div>

</x-layout>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.2/Sortable.min.js"></script>
<script>
    function toggleEdit(id) {
        const row = document.getElementById('link-' + id);
        row.querySelector('.link-display').classList.toggle('hidden');
        row.querySelector('.link-edit').classList.toggle('hidden');
    }

    const el = document.getElementById('sortable-links');
    if (el) {
        Sortable.create(el, {
            handle: '.drag-handle',
            animation: 150,
            onEnd() {
                const order = [...el.querySelectorAll('li[data-id]')].map(li => li.dataset.id);
                fetch(`{{ route( 'links.reorder') }}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        order
                    }),
                });
            },
        });
    }
</script>