<x-layout :header="true">
    <x-header type="sidebar">
        <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Home</a>
        <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Dashboard</a>
        <a href="{{ route('users.create') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Create User</a>
    </x-header>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Users</h1>
    </div>
    <hr class="border-gray-300 mb-6">

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($users as $user)
        <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition-shadow duration-300">
            <h2 class="text-lg font-semibold text-gray-800">{{ $user->name }}</h2>
            <p class="text-gray-600">{{ $user->email }}</p>
            <div class="mt-4 flex gap-2 items-center">
                <a href="{{ route('users.edit', $user) }}" class="flex items-center justify-center px-2 py-1 text-xs rounded bg-gray-900 text-white  hover:bg-gray-800 transition">Edit</a>
                <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" class="inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="flex items-center justify-center cursor-pointer bg-red-500 px-2 py-1 text-xs text-white rounded hover:bg-red-600 transition">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>

</x-layout>