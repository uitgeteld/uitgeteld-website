<x-layout :header="true" :footer="false">
    <x-header type="sidebar">
        <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Home</a>
        <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Dashboard</a>
        <a href="{{ route('users.index') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Users</a>
    </x-header>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Edit User</h1>
    </div>
    <hr class="border-gray-300 mb-6">

    <div class="max-w-2xl mx-auto px-4 py-4 space-y-6">
        
        <!-- Profile Information -->
        <div class="bg-white p-6 rounded-lg border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Profile Information</h2>
            
            <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                </div>

                <div class="flex items-center">
                    <input type="checkbox" name="is_admin" id="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }}
                        class="w-4 h-4 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400 cursor-pointer">
                    <label for="is_admin" class="ml-2 text-sm text-gray-700">Administrator</label>
                </div>

                <div class="flex gap-3 pt-2">
                    <button type="submit" class="px-6 py-2 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition-colors">
                        Update Profile
                    </button>
                    <a href="{{ route('users.index') }}" class="px-6 py-2 bg-gray-200 text-gray-700 font-medium rounded-lg hover:bg-gray-300 transition-colors">
                        Cancel
                    </a>
                </div>
            </form>

            @if ($errors->any() && !$errors->has('password'))
            <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        @if (!str_contains($error, 'password'))
                        <li>{{ $error }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('success'))
            <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
                {{ session('success') }}
            </div>
            @endif
        </div>

        <!-- Two-Factor Authentication Status -->
        <div class="bg-white p-6 rounded-lg border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 mb-2">Two-Factor Authentication</h2>
            <p class="text-sm text-gray-600 mb-4">
                Additional security status for this account.
            </p>
            
            @if($user->two_factor_secret)
            <span class="text-sm text-green-600 font-medium">✓ Enabled</span>
            @else
            <span class="text-sm text-gray-500">Not enabled</span>
            @endif
        </div>

        <!-- Change Password -->
        <div class="bg-white p-6 rounded-lg border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Change Password</h2>
            
            <form action="{{ route('users.update', $user) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Hidden fields to maintain other data -->
                <input type="hidden" name="name" value="{{ $user->name }}">
                <input type="hidden" name="email" value="{{ $user->email }}">
                @if($user->is_admin)
                <input type="hidden" name="is_admin" value="1">
                @endif

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                    <p class="mt-1 text-sm text-gray-500">Enter a new password (minimum 6 characters)</p>
                </div>

                <button type="submit" class="px-6 py-2 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition-colors">
                    Update Password
                </button>
            </form>

            @if ($errors->has('password'))
            <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->get('password') as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>

    </div>

</x-layout>
