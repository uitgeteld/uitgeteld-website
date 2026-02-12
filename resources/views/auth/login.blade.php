<x-layout>

    <div class="min-h-screen bg-white flex items-center justify-center px-4">
        <div class="w-full max-w-md">
            <div class="mb-8">
                <h1 class="text-3xl font-light text-gray-900">Sign in</h1>
            </div>

            <form action="{{ url('/login') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="email_or_name" class="block text-sm text-gray-700 mb-2">Email or Username</label>
                    <input id="email_or_name" type="text" name="email_or_name" value="{{ old('email_or_name') }}" required
                        class="w-full px-4 py-2 border border-gray-300 text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                </div>

                <div>
                    <label for="password" class="block text-sm text-gray-700 mb-2">Password</label>
                    <input id="password" type="password" name="password" required
                        class="w-full px-4 py-2 border border-gray-300 text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                </div>

                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" class="w-4 h-4 border border-gray-300">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Remember me</label>
                </div>

                <button type="submit" class="w-full bg-gray-900 text-white py-2 mt-8 hover:bg-gray-800 transition cursor-pointer">
                    Sign in
                </button>
            </form>

            @if ($errors->any())
            <div class="mt-6 p-3 bg-red-50 border border-red-200 rounded text-red-700 text-sm">
                <!-- {{ $errors->first() }} -->
                Invalid email or password.
            </div>
            @endif

        </div>
    </div>

</x-layout>