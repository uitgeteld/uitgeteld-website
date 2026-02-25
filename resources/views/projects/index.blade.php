<x-layout :title="'Projects'">
    <x-header type="burger" :side="true">
        <a href="{{ route('about') }}" class="block px-3 py-2 md:p-0 text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1">About</a>
        @if(Auth::check())
        <a href="{{ route('projects.create') }}" class="block px-3 py-2 md:p-0 text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1">Upload</a>
        @endif
    </x-header>
</x-layout>