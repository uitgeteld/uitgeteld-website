<x-layout :footer="false" :overflow="true">
    <x-header type="burger">
        <a href="{{ route('dashboard') }}" class="text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1 inline-block">Dashboard</a>
        <a href="{{ route('projects.index') }}" class="text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1 inline-block">Projects</a>
    </x-header>

        <div class="text-center animate-fadeUp flex items-center justify-center min-h-screen">
            <h1 class="text-[clamp(20px,7vw,96px)] font-bold tracking-tight leading-none animate-float">
                uitgeteld.xyz
            </h1>
        </div>

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

        .animate-fadeUp {
            animation: fadeUp 1.2s cubic-bezier(0.16, 1, 0.3, 1) both;
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>

</x-layout>