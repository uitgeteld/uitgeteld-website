<div class="fixed left-0 top-0 w-38 h-screen bg-white border-r border-gray-200 flex flex-col z-40 overflow-hidden">
    <div class="flex-1 overflow-hidden py-3">
        {{ $slot }}
    </div>

    <div class="p-3 border-t border-gray-200">
        <form action="{{ route('logout') }}" method="POST" class="w-full">
            @csrf
            <button type="submit" class="w-full px-2 py-2 bg-red-500 text-white text-xs font-semibold rounded hover:bg-red-600 transition-colors duration-300 cursor-pointer">
                Logout
            </button>
        </form>
    </div>
</div>