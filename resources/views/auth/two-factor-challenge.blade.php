<x-layout>

    <a href="javascript:history.back()" class="fixed top-3 left-3 p-3 text-gray-600 hover:text-gray-900 transition z-50">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M19 12H5M12 19l-7-7 7-7"/>
        </svg>
    </a>

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md">
            <div class="mb-8">
                <h1 class="text-3xl font-light text-gray-900">Two-Factor Authentication</h1>
                <p class="text-sm text-gray-600 mt-2" x-data="{ recovery: false }">
                    <span x-show="!recovery">
                        Please enter the authentication code from your authenticator app.
                    </span>
                    <span x-show="recovery" x-cloak>
                        Please enter one of your emergency recovery codes.
                    </span>
                </p>
            </div>

            <div x-data="{ recovery: false }">
                <form action="{{ route('two-factor.login') }}" method="POST" class="space-y-5">
                    @csrf

                    <div x-show="!recovery">
                        <label for="code" class="block text-sm text-gray-700 mb-2">Authentication Code</label>
                        <input id="code" type="text" name="code" autofocus autocomplete="one-time-code"
                            class="w-full px-4 py-2 border border-gray-300 text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                    </div>

                    <div x-show="recovery" x-cloak>
                        <label for="recovery_code" class="block text-sm text-gray-700 mb-2">Recovery Code</label>
                        <input id="recovery_code" type="text" name="recovery_code" autocomplete="one-time-code"
                            class="w-full px-4 py-2 border border-gray-300 text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                    </div>

                    <button type="submit" class="w-full bg-gray-900 text-white py-2 mt-8 hover:bg-gray-800 transition cursor-pointer">
                        Verify
                    </button>
                </form>

                <div class="mt-6 text-center">
                    <button @click="recovery = !recovery" type="button" class="text-sm text-gray-600 hover:text-gray-900 cursor-pointer">
                        <span x-show="!recovery">Use a recovery code</span>
                        <span x-show="recovery" x-cloak>Use an authentication code</span>
                    </button>
                </div>
            </div>

            @if ($errors->any())
            <div class="mt-6 p-3 bg-red-50 border border-red-200 rounded text-red-700 text-sm">
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>

</x-layout>