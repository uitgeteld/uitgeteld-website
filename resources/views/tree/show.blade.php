<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }}</title>
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
        *, body { font-family: 'JetBrains Mono', monospace; }

        @keyframes blink { 0%, 100% { opacity: 1; } 50% { opacity: 0; } }
        .cursor::after { content: '_'; animation: blink 1.2s step-end infinite; }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(6px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        .fade { animation: fadeIn 0.35s ease both; }
        .fade:nth-child(1) { animation-delay: 0.05s; }
        .fade:nth-child(2) { animation-delay: 0.12s; }
        .fade:nth-child(3) { animation-delay: 0.19s; }
        .fade:nth-child(4) { animation-delay: 0.26s; }
        .fade:nth-child(5) { animation-delay: 0.33s; }
        .fade:nth-child(n+6) { animation-delay: 0.40s; }
    </style>
</head>

<body class="bg-zinc-100 dark:bg-zinc-950 w-screen flex items-center justify-center transition-colors duration-200 min-h-dvh overflow-x-hidden pb-[env(safe-area-inset-bottom)] pl-[env(safe-area-inset-left)] pr-[env(safe-area-inset-right)]">

    <button id="theme-toggle"
        class="fixed top-4 right-4 bg-transparent text-[0.65rem] px-2 py-1 cursor-pointer rounded-xs transition-[border-color,color] duration-150 border border-zinc-300 text-zinc-400 hover:border-green-500 hover:text-green-500 dark:border-zinc-600 dark:text-zinc-500 dark:hover:border-green-400 dark:hover:text-green-400"
        onclick="toggleTheme()" title="Toggle theme">[dark]</button>

    <div class="w-full max-w-sm px-6 py-12 flex flex-col gap-5 lg:gap-6">

        <div class="fade">
            <div class="flex items-center gap-4 md:gap-3 mb-1.5 md:mb-1">
                <div class="w-12 h-12 md:w-10 md:h-10 lg:w-8 lg:h-8 rounded-sm bg-green-500/10 border border-green-500/30 flex items-center justify-center text-green-500 dark:text-green-400 text-base md:text-sm lg:text-xs font-semibold select-none">
                    {{ strtolower(substr($user->name, 0, 1)) }}
                </div>
                <span class="text-zinc-900 dark:text-white text-xl md:text-lg lg:text-sm font-semibold cursor">{{ $user->name }}</span>
            </div>
            @if($tree->description)
            <p class="text-zinc-500 text-sm lg:text-xs pl-16 md:pl-14 lg:pl-11">{{ $tree->description }}</p>
            @endif
        </div>

        <div class="fade flex items-center gap-2">
            <span class="text-green-500 text-sm lg:text-xs">&#9658;</span>
            <span class="text-zinc-400 dark:text-zinc-600 text-sm lg:text-xs">ls ./links</span>
            <div class="flex-1 border-t border-zinc-200 dark:border-zinc-800"></div>
        </div>

        <div class="flex flex-col gap-3 md:gap-2.5 lg:gap-2">
            @foreach($tree->links as $index => $link)
            <a href="{{ $link->url }}" target="_blank"
                class="fade link-row group flex items-center justify-between px-4 lg:px-3 py-4 md:py-3 lg:py-2.5 rounded-sm bg-white dark:bg-zinc-900 border border-zinc-200 dark:border-zinc-800 hover:bg-zinc-50 dark:hover:bg-zinc-800/60 active:bg-zinc-100 dark:active:bg-zinc-700 transition-all duration-150 no-underline"
                style="--link-color: {{ $link->color }}">
                <div class="flex items-center gap-4 md:gap-3">
                    <span class="text-sm md:text-xs w-5 md:w-4" style="color: {{ $link->color }}">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                    <span class="text-zinc-700 dark:text-zinc-200 text-base md:text-sm lg:text-xs">{{ $link->content }}</span>
                </div>
                <span class="inline-block transition-transform duration-150 text-zinc-400 dark:text-zinc-600 group-hover:translate-x-[3px] text-base md:text-sm lg:text-xs">&#8599;</span>
            </a>
            @endforeach
        </div>

        <div class="fade flex justify-between text-zinc-400 dark:text-zinc-700 text-sm md:text-xs">
            <span><span class="text-green-500">$</span> exit 0</span>
            <span>&copy; {{ date('Y') }} {{ $user->name }}</span>
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
