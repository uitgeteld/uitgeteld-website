<x-layout :header="true" :footer="false">
    <x-header type="sidebar">
        <a href="{{ route('home') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Home</a>
        <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Dashboard</a>
    </x-header>

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Profile Settings</h1>
    </div>
    <hr class="border-gray-300 mb-6">

    <div class="max-w-2xl mx-auto px-4 py-4 space-y-6">
        
        <div class="bg-white p-6 rounded-lg border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Profile Information</h2>
            
            <form action="{{ url('/user/profile-information') }}" method="POST" class="space-y-4">
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

                <div>
                    <span class="text-sm text-gray-600">Role:</span>
                    <span class="ml-2 {{ $user->is_admin ? 'text-red-600 font-medium' : 'text-gray-900' }}">
                        {{ $user->is_admin ? 'Administrator' : 'User' }}
                    </span>
                </div>

                <button type="submit" class="px-6 py-2 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition-colors">
                    Update Profile
                </button>
            </form>

            @if ($errors->updateProfileInformation->any())
            <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->updateProfileInformation->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('status') === 'profile-information-updated')
            <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
                Profile updated successfully.
            </div>
            @endif
        </div>

        <div class="bg-white p-6 rounded-lg border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 mb-2">Two-Factor Authentication</h2>
            <p class="text-sm text-gray-600 mb-4">
                Add additional security to your account using two-factor authentication.
            </p>
            
            @if($user->two_factor_secret)
            <div class="flex items-center gap-3">
                <span class="text-sm text-green-600 font-medium">✓ Enabled</span>
                <a href="{{ route('profile.two-factor') }}" 
                   class="px-4 py-2 bg-gray-900 text-white text-sm rounded-lg hover:bg-gray-800 transition-colors">
                    Manage 2FA
                </a>
            </div>
            @else
            <a href="{{ route('profile.two-factor') }}" 
               class="inline-block px-4 py-2 bg-gray-900 text-white text-sm rounded-lg hover:bg-gray-800 transition-colors">
                Enable Two-Factor Authentication
            </a>
            @endif
        </div>

        <div class="bg-white p-6 rounded-lg border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 mb-4">Change Password</h2>
            
            <form action="{{ url('/user/password') }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">Current Password</label>
                    <input type="password" name="current_password" id="current_password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700 mb-2">New Password</label>
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                </div>

                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">Confirm New Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                </div>

                <button type="submit" class="px-6 py-2 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition-colors">
                    Update Password
                </button>
            </form>

            @if ($errors->updatePassword->any())
            <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->updatePassword->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('status') === 'password-updated')
            <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
                Password updated successfully.
            </div>
            @endif
        </div>

    </div>

</x-layout>
