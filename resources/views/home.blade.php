<x-layout :footer="false">
    <x-header type="burger">
        <a href="/dashboard" class="text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1 inline-block">Dashboard</a>
    </x-header>

    <main class="flex items-center justify-center min-h-screen">
        <div class="text-center animate-fadeUp">
            <h1 class="text-[clamp(20px,7vw,96px)] font-bold tracking-tight leading-none mb-4 animate-float">
                uitgeteld.xyz
            </h1>
        </div>
    </main>

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