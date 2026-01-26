<x-layout :title="'Projects'">
    <x-header type="burger">
        <a href="{{ route('home') }}" class="text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1 inline-block">Home</a>
        @if(Auth::user())
        <a href="{{ route('projects.create') }}" class="text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1 inline-block">Create</a>
        @endif
    </x-header>
</x-layout>