<x-layout :header="true" :footer="false">
    <x-header type="sidebar" />

    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Two-Factor Authentication</h1>
    </div>
    <hr class="border-gray-300 mb-6">

    <div class="max-w-2xl mx-auto px-4 py-4" x-data="{ showRecoveryCodes: false, recoveryCodes: [] }">

        @if(!$user->two_factor_secret)
        <div class="bg-white p-6 rounded-lg border border-gray-200">
            <h2 class="text-lg font-semibold text-gray-900 mb-2">Enable Two-Factor Authentication</h2>
            <p class="text-sm text-gray-600 mb-4">
                Two-factor authentication adds an additional layer of security to your account by requiring more than just a password to log in.
            </p>

            <form action="{{ url('/user/two-factor-authentication') }}" method="POST">
                @csrf
                <button type="submit" class="px-6 py-2 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition-colors cursor-pointer">
                    Enable
                </button>
            </form>
        </div>
        @else
        <div class="space-y-6">

            <div class="bg-green-50 p-4 rounded-lg border border-green-200">
                <div class="flex items-center">
                    <span class="text-green-600 font-medium">✓ Two-Factor Authentication is enabled</span>
                </div>
            </div>

            @if(!$user->two_factor_confirmed_at)
            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Finish Setup</h2>

                <p class="text-sm text-gray-600 mb-4">
                    Scan the QR code below with your authenticator app (Google Authenticator, Authy, Microsoft Authenticator, etc.).
                </p>

                <div class="bg-white p-4 rounded-lg border-2 border-gray-300 inline-block mb-4">
                    {!! $user->twoFactorQrCodeSvg() !!}
                </div>

                <p class="text-sm text-gray-600 mb-4">
                    After scanning, enter the 6-digit code from your app to confirm setup.
                </p>

                <form action="{{ url('/user/confirmed-two-factor-authentication') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="code" class="block text-sm font-medium text-gray-700 mb-2">Authentication Code</label>
                        <input type="text" name="code" id="code" required maxlength="6" pattern="[0-9]{6}"
                            class="w-full max-w-xs px-4 py-2 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:border-gray-400">
                    </div>

                    <button type="submit" class="px-6 py-2 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition-colors cursor-pointer">
                        Confirm Setup
                    </button>
                </form>

                @if ($errors->any())
                <div class="mt-4 p-4 bg-red-50 border border-red-200 rounded-lg text-red-700 text-sm">
                    Invalid authentication code. Please try again.
                </div>
                @endif
            </div>
            @endif

            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900 mb-2">Recovery Codes</h2>
                <p class="text-sm text-gray-600 mb-4">
                    Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two-factor authentication device is lost.
                </p>

                <button @click="
                    fetch('{{ url('/user/two-factor-recovery-codes') }}', {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        recoveryCodes = data;
                        showRecoveryCodes = true;
                    })
                "
                    class="px-6 py-2 bg-gray-900 text-white font-medium rounded-lg hover:bg-gray-800 transition-colors cursor-pointer">
                    Show Recovery Codes
                </button>

                <div x-show="showRecoveryCodes" x-cloak class="mt-4 p-4 bg-gray-50 rounded-lg border border-gray-300">
                    <div class="grid grid-cols-2 gap-2">
                        <template x-for="code in recoveryCodes" :key="code">
                            <div class="font-mono text-sm text-gray-900" x-text="code"></div>
                        </template>
                    </div>
                    <p class="mt-4 text-xs text-gray-600">Save these codes now. Each code can only be used once.</p>
                </div>

                <form action="{{ url('/user/two-factor-recovery-codes') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="px-6 py-2 bg-white text-gray-700 font-medium rounded-lg border border-gray-300 hover:bg-gray-50 transition-colors cursor-pointer">
                        Regenerate Recovery Codes
                    </button>
                </form>
            </div>

            <div class="bg-white p-6 rounded-lg border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-900 mb-2">Disable Two-Factor Authentication</h2>
                <p class="text-sm text-gray-600 mb-4">
                    Remove two-factor authentication from your account.
                </p>

                <form action="{{ url('/user/two-factor-authentication') }}" method="POST" onsubmit="return confirm('Are you sure you want to disable two-factor authentication?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-6 py-2 bg-red-600 text-white font-medium rounded-lg hover:bg-red-700 transition-colors cursor-pointer">
                        Disable
                    </button>
                </form>
            </div>

        </div>
        @endif

        @if (session('status') === 'two-factor-authentication-enabled')
        <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
            Two-factor authentication has been enabled. Please scan the QR code above.
        </div>
        @endif

        @if (session('status') === 'two-factor-authentication-confirmed')
        <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
            Two-factor authentication confirmed and enabled successfully!
        </div>
        @endif

        @if (session('status') === 'two-factor-authentication-disabled')
        <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
            Two-factor authentication has been disabled.
        </div>
        @endif

        @if (session('status') === 'recovery-codes-generated')
        <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-lg text-green-700 text-sm">
            New recovery codes have been generated.
        </div>
        @endif

    </div>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <script src="//unpkg.com/alpinejs" defer></script>

</x-layout>