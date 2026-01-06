<x-layout :hasSidebar="true">
	<x-slot name="header">
		<h2 class="font-semibold text-xl">Create New Account</h2>
	</x-slot>

	<x-sidebar>
        <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">← Dashboard</a>
		<a href="{{ route('users.index') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Users</a>
	</x-sidebar>

	<div class="mt-6 bg-white shadow rounded p-6 max-w-md">
		<form action="{{ route('users.store') }}" method="POST" class="space-y-4">
			@csrf
			<div>
				<label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
				<input type="text"
					id="name"
					name="name"
					value="{{ old('name') }}"
					required
					class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('name') @enderror">
				@error('name')
				<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
				@enderror
			</div>

			<div>
				<label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
				<input type="email"
					id="email"
					name="email"
					value="{{ old('email') }}"
					required
					class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('email') @enderror">
				@error('email')
				<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
				@enderror
			</div>

			<div>
				<label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
				<input type="password"
					id="password"
					name="password"
					required
					class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 @error('password') @enderror">
				@error('password')
				<p class="mt-1 text-sm text-red-600">{{ $message }}</p>
				@enderror
			</div>

			<div>
				<label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
				<input type="password"
					id="password_confirmation"
					name="password_confirmation"
					required
					class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
			</div>

			<button type="submit"
				class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-150">
				Create Account
			</button>
		</form>
	</div>
</x-layout>