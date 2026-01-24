<x-layout :header="true" :footer="true">
    <x-header type="sidebar">
        <a href="{{ route('dashboard') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">← Dashboard</a>
        <a href="{{ route('users.create') }}" class="block px-3 py-2 text-gray-600 font-medium transition-all duration-300 hover:text-black hover:translate-x-1">Create</a>
    </x-header>

    <div class="mt-6 bg-white shadow rounded p-6">
        @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Admin?</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>