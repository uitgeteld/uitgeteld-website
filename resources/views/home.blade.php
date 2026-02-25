<x-layout :footer="false" :overflow="true">
    <x-header type="burger" />
    <div class="text-center animate-[fadeUp_1.2s_cubic-bezier(0.16,1,0.3,1)_both] flex flex-col items-center justify-center min-h-screen gap-8">
        <h1 class="text-[clamp(20px,7vw,96px)] font-bold tracking-tight leading-none animate-[float_3s_ease-in-out_infinite]">
            uitgeteld.xyz
        </h1>
        <!-- <div class="rounded-lg overflow-hidden shadow-2xl border border-[#3c3c3c]">
            <div class="bg-[#323233] px-4 py-2 flex items-center gap-2 border-b border-[#3c3c3c]">
                <div class="flex gap-2">
                    <div class="w-3 h-3 rounded-full bg-[#ff5f57]"></div>
                    <div class="w-3 h-3 rounded-full bg-[#febc2e]"></div>
                    <div class="w-3 h-3 rounded-full bg-[#28c840]"></div>
                </div>
            </div>
            <div class="bg-[#1e1e1e] px-6 py-4 font-mono text-sm md:text-base">
                <code class="text-[#d4d4d4]"><span class="text-[#4ec9b0]">npm</span> <span class="text-[#9cdcfe]">i</span> <span class="text-[#ce9178]">uitgeteld.xyz</span> <span class="text-[#569cd6]">--dev</span></code>
            </div>
        </div> -->

        <!-- <div class="bg-[#1e1e1e] px-6 py-4 rounded-lg font-mono text-sm md:text-base shadow-2xl border-2 border-[#272727]">
            <code class="text-[#d4d4d4]"><span class="text-[#4ec9b0]">$</span> <span class="text-[#4ec9b0]">npm</span> <span class="text-[#9cdcfe]">i</span> <span class="text-[#569cd6]">--save</span> <span class="text-[#ce9178]">uitgeteld.xyz</span></code>
        </div> -->
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