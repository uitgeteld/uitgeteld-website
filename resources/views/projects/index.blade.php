<x-layout :title="'Projects'" :footer="true">
    <x-header type="burger">
        <a href="{{ route('home') }}" class="text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1 inline-block">Home</a>
        <a href="{{ route('dashboard') }}" class="text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1 inline-block">Dashboard</a>
        <a href="{{ route('projects.create') }}" class="text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1 inline-block">Upload</a>
    </x-header>
</x-layout>