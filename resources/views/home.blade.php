<x-layout :showFooter="false">

    <div class="absolute top-8 left-8 z-20">
        <input type="checkbox" id="menu_checkbox" class="hidden">
        <label for="menu_checkbox" class="block w-8 h-8 cursor-pointer">
            <div class="bar-dot"></div>
            <div class="bar-dot"></div>
            <div class="bar-dot"></div>
        </label>

        <nav class="menu-nav mt-3 opacity-0 pointer-events-none transition-all! duration-500!">
            <ul class="p-0 space-y-1">
                <li class="list-none">
                    <a href="/dashboard" class="text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1 inline-block">Dashboard</a>
                </li>
            </ul>
        </nav>
    </div>

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

        /* Burger Menu Styles */
        .bar-dot {
            height: 3px;
            background-color: #111827;
            margin-left: 0;
            margin-bottom: 4px;
            border-radius: 3px;
            transition: 0.3s ease width, 0.3s ease margin-left, 0.3s ease margin-bottom, 0.3s ease background-color;
        }

        .bar-dot:first-child {
            width: 24px;
        }

        .bar-dot:nth-child(2) {
            width: 18px;
        }

        .bar-dot:last-child {
            width: 32px;
            margin-bottom: 0;
        }

        #menu_checkbox:checked+label {
            transform: rotateZ(-90deg);
        }

        #menu_checkbox:checked+label .bar-dot {
            width: 4px;
            margin-left: 14px;
            margin-bottom: 2px;
            background-color: #111827;
        }

        #menu_checkbox:checked~.menu-nav {
            opacity: 1;
            pointer-events: auto;
        }
    </style>

</x-layout>