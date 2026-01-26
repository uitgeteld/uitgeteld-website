<x-layout :footer="true" :header="true">
    <x-header type="sidebar">
		<a href="{{ route('dashboard') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Dashboard</a>
		<a href="{{ route('users.index') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Users</a>
	</x-header>
</x-layout>