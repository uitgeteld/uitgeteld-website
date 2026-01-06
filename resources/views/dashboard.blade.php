<x-layout :showFooter="false" :hasSidebar="true">
	<x-sidebar>
        <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">← Home</a>
		<a href="{{ route('users.index') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Users</a>
	</x-sidebar>
	
	<div class="min-h-screen bg-slate-50 p-8">
		<header class="mb-6">
			<h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
		</header>

		<hr class="border-gray-300 mb-6">

		<h3 class="text-lg font-bold text-gray-900 mb-2">Welcome, {{ Auth::user()->name }} 🎉</h3>
	</div>
</x-layout>