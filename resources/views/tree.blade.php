<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uitgeteld - ov</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;600&display=swap" rel="stylesheet">
    <script>
        (function() {
            const stored = localStorage.getItem('theme');
            const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            if (stored === 'dark' || (!stored && prefersDark)) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>
    <style>
        *,
        body {
            font-family: 'JetBrains Mono', monospace;
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }
        }

        .cursor::after {
            content: '_';
            animation: blink 1.2s step-end infinite;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(6px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade {
            animation: fadeIn 0.35s ease both;
        }

        .fade:nth-child(1) {
            animation-delay: 0.05s;
        }

        .fade:nth-child(2) {
            animation-delay: 0.12s;
        }

        .fade:nth-child(3) {
            animation-delay: 0.19s;
        }

        .fade:nth-child(4) {
            animation-delay: 0.26s;
        }

        .fade:nth-child(5) {
            animation-delay: 0.33s;
        }


    </style>
</head>

<body class="bg-zinc-100 dark:bg-zinc-950 w-screen flex items-center justify-center transition-colors duration-200 h-dvh overflow-hidden pb-[env(safe-area-inset-bottom)] pl-[env(safe-area-inset-left)] pr-[env(safe-area-inset-right)]">

    <button id="theme-toggle"
        class="fixed top-4 right-4 bg-transparent text-[0.65rem] px-2 py-1 cursor-pointer rounded-xs transition-[border-color,color] duration-150 border border-zinc-300 text-zinc-400 hover:border-green-500 hover:text-green-500 dark:border-zinc-600 dark:text-zinc-500 dark:hover:border-green-400 dark:hover:text-green-400"
        onclick="toggleTheme()" title="Toggle theme">[dark]</button>

    <div class="w-full max-w-sm px-6 flex flex-col gap-5 lg:gap-6">

        <div class="fade">
            <div class="flex items-center gap-4 md:gap-3 mb-1.5 md:mb-1">
                <div class="w-12 h-12 md:w-10 md:h-10 lg:w-8 lg:h-8 rounded-sm bg-green-500/10 border border-green-500/30 flex items-center justify-center text-green-500 dark:text-green-400 text-base md:text-sm lg:text-xs font-semibold select-none">
                    u
                </div>
                <span class="text-zinc-900 dark:text-white text-xl md:text-lg lg:text-sm font-semibold cursor">uitgeteld - ov</span>
            </div>
            <p class="text-zinc-500 text-sm lg:text-xs pl-16 md:pl-14 lg:pl-11">developer &amp; artist</p>
        </div>

        <div class="fade flex items-center gap-2">
            <span class="text-green-500 text-sm lg:text-xs">&#9658;</span>
            <span class="text-zinc-400 dark:text-zinc-600 text-sm lg:text-xs">ls ./links</span>
            <div class="flex-1 border-t border-zinc-200 dark:border-zinc-800"></div>
        </div>

        <div class="flex flex-col gap-3 md:gap-2.5 lg:gap-2">

            <a href="{{ url('/') }}" class="fade link-row group flex items-center justify-between px-4 lg:px-3 py-4 md:py-3 lg:py-2.5 rounded-sm bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-green-500/50 hover:bg-zinc-50 dark:hover:bg-zinc-800/60 active:bg-zinc-100 dark:active:bg-zinc-700 transition-all duration-150 no-underline">
                <div class="flex items-center gap-4 md:gap-3">
                    <span class="text-green-500 text-sm md:text-xs w-5 md:w-4">01</span>
                    <span class="text-zinc-700 dark:text-zinc-200 text-base md:text-sm lg:text-xs">website</span>
                </div>
                <span class="inline-block transition-transform duration-150 text-zinc-400 dark:text-zinc-600 group-hover:text-green-500 dark:group-hover:text-green-400 group-hover:translate-x-[3px] text-base md:text-sm lg:text-xs">&#8594;</span>
            </a>

            <a href="{{ url('/projects') }}" class="fade link-row group flex items-center justify-between px-4 lg:px-3 py-4 md:py-3 lg:py-2.5 rounded-sm bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-green-500/50 hover:bg-zinc-50 dark:hover:bg-zinc-800/60 active:bg-zinc-100 dark:active:bg-zinc-700 transition-all duration-150 no-underline">
                <div class="flex items-center gap-4 md:gap-3">
                    <span class="text-green-500 text-sm md:text-xs w-5 md:w-4">02</span>
                    <span class="text-zinc-700 dark:text-zinc-200 text-base md:text-sm lg:text-xs">projects</span>
                </div>
                <span class="inline-block transition-transform duration-150 text-zinc-400 dark:text-zinc-600 group-hover:text-green-500 dark:group-hover:text-green-400 group-hover:translate-x-[3px] text-base md:text-sm lg:text-xs">&#8594;</span>
            </a>

            <a href="https://github.com/uitgeteld" target="_blank" class="fade link-row group flex items-center justify-between px-4 lg:px-3 py-4 md:py-3 lg:py-2.5 rounded-sm bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-blue-500/50 hover:bg-zinc-50 dark:hover:bg-zinc-800/60 active:bg-zinc-100 dark:active:bg-zinc-700 transition-all duration-150 no-underline">
                <div class="flex items-center gap-4 md:gap-3">
                    <span class="text-blue-500 dark:text-blue-400 text-sm md:text-xs w-5 md:w-4">03</span>
                    <span class="text-zinc-700 dark:text-zinc-200 text-base md:text-sm lg:text-xs">github</span>
                </div>
                <span class="inline-block transition-transform duration-150 text-zinc-400 dark:text-zinc-600 group-hover:text-blue-500 dark:group-hover:text-blue-400 group-hover:translate-x-[3px] text-base md:text-sm lg:text-xs">&#8599;</span>
            </a>

            <a href="https://open.spotify.com/artist/0Z3N1r82b0yIPk0NV0GgMk?si=4459cd89b27f4fd9" target="_blank" class="fade link-row group flex items-center justify-between px-4 lg:px-3 py-4 md:py-3 lg:py-2.5 rounded-sm bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-green-400/50 hover:bg-zinc-50 dark:hover:bg-zinc-800/60 active:bg-zinc-100 dark:active:bg-zinc-700 transition-all duration-150 no-underline">
                <div class="flex items-center gap-4 md:gap-3">
                    <span class="text-green-500 dark:text-green-400 text-sm md:text-xs w-5 md:w-4">04</span>
                    <span class="text-zinc-700 dark:text-zinc-200 text-base md:text-sm lg:text-xs">spotify</span>
                </div>
                <span class="inline-block transition-transform duration-150 text-zinc-400 dark:text-zinc-600 group-hover:text-green-500 dark:group-hover:text-green-400 group-hover:translate-x-[3px] text-base md:text-sm lg:text-xs">&#8599;</span>
            </a>

            <a href="https://soundcloud.com/byeov" target="_blank" class="fade link-row group flex items-center justify-between px-4 lg:px-3 py-4 md:py-3 lg:py-2.5 rounded-sm bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:border-orange-500/50 hover:bg-zinc-50 dark:hover:bg-zinc-800/60 active:bg-zinc-100 dark:active:bg-zinc-700 transition-all duration-150 no-underline">
                <div class="flex items-center gap-4 md:gap-3">
                    <span class="text-orange-500 dark:text-orange-400 text-sm md:text-xs w-5 md:w-4">05</span>
                    <span class="text-zinc-700 dark:text-zinc-200 text-base md:text-sm lg:text-xs">soundcloud</span>
                </div>
                <span class="inline-block transition-transform duration-150 text-zinc-400 dark:text-zinc-600 group-hover:text-orange-500 dark:group-hover:text-orange-400 group-hover:translate-x-[3px] text-base md:text-sm lg:text-xs">&#8599;</span>
            </a>

        </div>

        <div class="fade flex justify-between text-zinc-400 dark:text-zinc-700 text-sm md:text-xs">
            <span><span class="text-green-500">$</span> exit 0</span>
            <span>&copy; {{ date('Y') }} uitgeteld.xyz</span>
        </div>

    </div>

    <script>
        const html = document.documentElement;
        const btn = document.getElementById('theme-toggle');

        function applyTheme(theme) {
            html.classList.toggle('dark', theme === 'dark');
            btn.textContent = theme === 'dark' ? '[dark]' : '[light]';
        }

        function toggleTheme() {
            const next = html.classList.contains('dark') ? 'light' : 'dark';
            localStorage.setItem('theme', next);
            applyTheme(next);
        }

        applyTheme(localStorage.getItem('theme') ??
            (window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'));
    </script>

</body>

</html>