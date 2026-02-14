<x-layout>

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md">
            <div class="mb-8">
                <h1 class="text-3xl font-light text-gray-900">Confirm Password</h1>
                <p class="text-sm text-gray-600 mt-2">
                    Please confirm your password before continuing.
                </p>
            </div>

            <form action="{{ url('/user/confirm-password') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="password" class="block text-sm text-gray-700 mb-2">Password</label>
                    <input id="password" type="password" name="password" required autofocus
                        class="w-full px-4 py-2 border border-gray-300 text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                </div>

                <button type="submit" class="w-full bg-gray-900 text-white py-2 mt-8 hover:bg-gray-800 transition cursor-pointer">
                    Confirm
                </button>
            </form>

            @if ($errors->any())
            <div class="mt-6 p-3 bg-red-50 border border-red-200 rounded text-red-700 text-sm">
                The password you entered is incorrect.
            </div>
            @endif

        </div>
    </div>

</x-layout>
