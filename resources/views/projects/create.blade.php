<x-layout :header="true" :footer="true" :title="'Create Project'">
    <x-header type="sidebar">
        <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Home</a>
        <a href="{{ route('projects.user') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Projects</a>
        @if(Auth::user() && Auth::user()->is_admin)
        <a href="{{ route('users.index') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Users</a>
        @endif
        <a href="{{ route('profile.show') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Profile</a>
    </x-header>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Upload Project</h1>
    </div>
    <hr class="border-gray-300 mb-6">

    <div class="max-w-2xl mx-auto px-4 py-4 md:mb-10">
        <div class="bg-white p-6 rounded-lg border border-gray-200">
            <form action="{{ route('projects.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Project Name <span class="text-red-500">*</span></label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400"
                        placeholder="My awesome project">
                    @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description <span class="text-red-500">*</span></label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400 resize-none"
                        placeholder="Describe your project...">{{ old('description') }}</textarea>
                    @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="github_url" class="block text-sm font-medium text-gray-700 mb-2">GitHub URL</label>
                    <input type="url" name="github_url" id="github_url" value="{{ old('github_url') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400"
                        placeholder="https://github.com/username/repo">
                    @error('github_url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="website_url" class="block text-sm font-medium text-gray-700 mb-2">Website URL</label>
                    <input type="url" name="website_url" id="website_url" value="{{ old('website_url') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400"
                        placeholder="https://myproject.com">
                    @error('website_url')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <select name="status" id="status" class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 focus:outline-none focus:border-gray-400 bg-white cursor-pointer">
                        <option value="planning" {{ old('status', 'planning') === 'planning' ? 'selected' : '' }}>Planning</option>
                        <option value="development" {{ old('status') === 'development' ? 'selected' : '' }}>Development</option>
                        <option value="completed" {{ old('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="on-hold" {{ old('status') === 'on-hold' ? 'selected' : '' }}>On Hold</option>
                        <option value="discontinued" {{ old('status') === 'discontinued' ? 'selected' : '' }}>Discontinued</option>
                    </select>
                    @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
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

                <div class="flex items-center gap-3 pt-2">
                    <button type="submit" class="px-6 py-2 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition-colors cursor-pointer">
                        Upload
                    </button>
                    <a href="{{ route('projects.index') }}" class="px-6 py-2 border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors cursor-pointer">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout>