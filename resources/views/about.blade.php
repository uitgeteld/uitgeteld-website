<x-layout :footer="true">
    <x-header type="burger">
        <a href="{{ route('home') }}" class="text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1 inline-block">Home</a>
        <a href="{{ route('dashboard') }}" class="text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1 inline-block">Dashboard</a>
        <a href="{{ route('projects.index') }}" class="text-gray-500 text-base no-underline transition-all duration-300 hover:text-black hover:translate-x-1 inline-block">Projects</a>
    </x-header>

    <div class="min-h-screen flex items-center justify-center px-4 mt-14 mb-8 md:my-8">
        <div class="max-w-2xl w-full space-y-8 animate-[fadeUp_1.2s_cubic-bezier(0.16,1,0.3,1)_both]">
            <div class="bg-white p-8 rounded-lg border border-gray-200">
                <h1 class="text-3xl font-bold text-gray-900 mb-6">About uitgeteld.xyz</h1>
                
                <div class="space-y-4 text-gray-700">
                    <p class="leading-relaxed">
                        A minimal link aggregator for developers and creators. No bloat, no fluff—just a clean way to share your work and connect with the world.
                    </p>
                    
                    <p class="leading-relaxed">
                        Build your personal tree, showcase your projects, and let people find everything they need in one place.
                    </p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-lg border border-gray-200">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">See it in Action</h2>
                
                <div class="space-y-3">
                    <a href="{{ route('projects.index') }}" class="flex items-start gap-3 p-4 rounded-lg border border-gray-300 hover:border-gray-900 hover:bg-gray-50 transition-all">
                        <span class="text-gray-900 font-bold">▸</span>
                        <div>
                            <p class="font-semibold text-gray-900">Projects Showcase</p>
                            <p class="text-sm text-gray-600">Browse all featured projects on the platform</p>
                        </div>
                    </a>
                    
                    <a href="{{ route('tree.show', 'light') }}" class="flex items-start gap-3 p-4 rounded-lg border border-gray-300 hover:border-gray-900 hover:bg-gray-50 transition-all">
                        <span class="text-gray-900 font-bold">▸</span>
                        <div>
                            <p class="font-semibold text-gray-900">Light.mp3's Tree</p>
                            <p class="text-sm text-gray-600">See how an artist showcases their work and projects</p>
                        </div>
                    </a>
                    
                    <a href="{{ route('tree.show', 'uitgeteld') }}" class="flex items-start gap-3 p-4 rounded-lg border border-gray-300 hover:border-gray-900 hover:bg-gray-50 transition-all">
                        <span class="text-gray-900 font-bold">▸</span>
                        <div>
                            <p class="font-semibold text-gray-900">My Personal Tree</p>
                            <p class="text-sm text-gray-600">Check out my personal tree and everything I'm working on</p>
                        </div>
                    </a>
                </div>
            </div>

            <div class="bg-white p-8 rounded-lg border border-gray-200">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Get in Touch</h2>
                
                <div class="space-y-4">
                    <p class="text-gray-700 leading-relaxed">
                        Want an account? Have feedback or ideas? Drop us a line.
                    </p>
                    
                    <div class="bg-gray-900 p-6 rounded-lg border border-gray-800 font-mono text-sm" style="background-color: #1e1e1e; border-color: #3c3c3c;">
                        <div style="color: #9cdcfe;">
                            <span style="color: #4ec9b0;">$</span> <span style="color: #ce9178;">email</span> <span style="color: #9cdcfe;">-t</span>
                        </div>
                        <div class="mt-3" style="color: #d4d4d4;">
                            <a href="mailto:uitgeteld@gmail.com" class="hover:underline" style="color: #4ec9b0;">
                                uitgeteld@gmail.com
                            </a>
                        </div>
                    </div>

                    <p class="text-sm text-gray-500">
                        Just send an email describing what you're working on or what brought you here. We read and reply to everything.
                    </p>
                </div>
            </div>

            <div class="bg-gray-900 p-8 rounded-lg border border-gray-900">
                <h2 class="text-2xl font-bold text-white mb-4">Join the Community</h2>
                <p class="text-gray-300 mb-6">
                    Whether you're a developer, designer, artist, or creator—uitgeteld.xyz is built for you. Share your links, showcase your projects, and connect with like-minded people. <span class="font-mono" style="color: #4ec9b0;">uitgeteld@gmail.com</span>
                </p>
                <a href="mailto:uitgeteld@gmail.com" class="inline-block px-6 py-2 bg-white text-gray-900 font-medium rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
                    Get Started
                </a>
            </div>
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
</style>