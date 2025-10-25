<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl">Users</h2>
            <a href="{{ route('users.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add User</a>
        </div>
    </x-slot>

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
</x-app-layout>