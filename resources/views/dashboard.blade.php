<x-layout :showFooter="false">
	<div class="min-h-screen bg-slate-50 p-8">
		<header class="flex justify-between items-center mb-6">
			<h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
			<form action="{{ route('logout') }}" method="POST">
				@csrf
				<button type="submit" class="bg-red-700 text-white px-4 py-2 rounded hover:bg-red-800 transition duration-200">Logout</button>
			</form>
		</header>

		<hr class="border-gray-300 mb-6">

		<h3 class="text-lg font-bold text-gray-900 mb-2">Welcome, {{ Auth::user()->name }} 🎉</h3>
		<!-- <p class="text-gray-600">Your email: {{ Auth::user()->email }}</p> -->
	</div>
</x-layout>