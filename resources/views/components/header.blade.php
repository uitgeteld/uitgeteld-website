@php
$type = $type ?? false;
@endphp

@if(empty($type) || $type === false)
@elseif($type === 'burger')
<header class="absolute top-8 left-8 z-20">
    <input type="checkbox" id="menu_checkbox" class="hidden peer">
    <label for="menu_checkbox" class="block w-8 h-8 cursor-pointer transition-transform duration-300 peer-checked:-rotate-90 [&:has(~input:checked)_.bar-dot]:w-1 [&:has(~input:checked)_.bar-dot]:ml-3.5 [&:has(~input:checked)_.bar-dot]:mb-0.5">
        <div class="bar-dot h-[3px] w-6 bg-gray-900 mb-1 rounded-[3px] transition-all duration-300"></div>
        <div class="bar-dot h-[3px] w-[18px] bg-gray-900 mb-1 rounded-[3px] transition-all duration-300"></div>
        <div class="bar-dot h-[3px] w-8 bg-gray-900 mb-0 rounded-[3px] transition-all duration-300"></div>
    </label>
    <nav class="mt-3 opacity-0 pointer-events-none transition-all duration-500 peer-checked:opacity-100 peer-checked:pointer-events-auto">
        <ul class="flex flex-col p-0 space-y-1">
            {{ $slot }}
            @if(Auth::check())
            <form action="{{ route('logout') }}" method="POST" class="w-full flex justify-center mt-2">
                @csrf
                <button type="submit" class="rounded-full px-4 py-2 bg-gray-900 text-white text-sm font-medium shadow hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 transition cursor-pointer">Logout</button>
            </form>
            @endif
        </ul>
    </nav>
</header>
@elseif($type === 'sidebar')
<header class="fixed left-0 top-0 w-36 h-screen bg-white border-r border-gray-200 flex-col z-40 overflow-hidden hidden md:flex">
    <div class="flex-1 overflow-hidden py-3">
        {{ $slot }}
    </div>
    <div class="p-2 border-t border-gray-200">
        <form action="{{ route('logout') }}" method="POST" class="w-full">
            @csrf
            <button type="submit" class="w-full bg-gray-900 text-white py-2 px-2 text-xs hover:bg-gray-800 transition cursor-pointer">Logout</button>
        </form>
    </div>
</header>

<header class="fixed top-0 left-0 w-full h-16 bg-white border-b border-gray-200 flex items-center justify-between z-40 px-4 md:hidden">
    <div class="flex-1 flex items-center overflow-hidden">
        {{ $slot }}
    </div>
    <form action="{{ route('logout') }}" method="POST" class="ml-4">
        @csrf
        <button type="submit" class="rounded-full px-4 py-2 bg-gray-900 text-white text-sm font-medium shadow hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-700 focus:ring-offset-2 transition">Logout</button>
    </form>
</header>
@endif

<style>
    #menu_checkbox:checked+label .bar-dot {
        width: 4px;
        margin-left: 14px;
        margin-bottom: 2px;
    }
</style>