<x-layout :footer="false" :overflow="true">
    <x-header type="burger">
        <a href="{{ route('dashboard') }}" class="text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1 inline-block">Dashboard</a>
        <a href="{{ route('projects.index') }}" class="text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1 inline-block">Projects</a>
    </x-header>

    <div class="text-center animate-[fadeUp_1.2s_cubic-bezier(0.16,1,0.3,1)_both] flex flex-col items-center justify-center min-h-screen px-4">
        <div class="animate-[float_3s_ease-in-out_infinite]">
            <h1 class="text-[clamp(80px,20vw,200px)] font-bold tracking-tight leading-none text-gray-900 mb-4">
                404
            </h1>
        </div>
        
        <h2 class="text-[clamp(24px,4vw,40px)] font-semibold text-gray-800 mb-4">
            Page Not Found
        </h2>
        
        <p class="text-gray-600 text-lg max-w-md mb-8">
            Oops! The page you're looking for doesn't exist. It might have been moved or deleted.
        </p>
        
        <div class="flex gap-4 flex-wrap justify-center">
            <a href="{{ route('home') }}" class="px-6 py-3 bg-black text-white rounded-lg font-medium transition-all duration-300 hover:bg-gray-800 hover:scale-105 inline-block">
                Back to home
            </a>
        </div>
    </div>
</x-layout>

<style>
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(20px) scale(0.98);
        }

        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }
</style>