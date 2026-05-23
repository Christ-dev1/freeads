<nav class="bg-white shadow-sm border-b border-gray-100 px-4 md:px-8 py-3 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto flex items-center justify-between">
        
        <!-- LOGO & NOM -->
        <a href="{{ route('ads.index') }}" class="flex items-center gap-3 group cursor-pointer">
            <div class="bg-brand p-2 rounded-xl shadow-lg shadow-emerald-50 transition-transform group-hover:rotate-12">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                </svg>
            </div>
            <span class="text-2xl font-black text-gray-900 tracking-tight">AdMarket</span>
        </a>

        <!-- BOUTON HAMBURGER (Mobile) -->
        <div class="md:hidden flex items-center">
            <button id="mobile-menu-button" class="text-gray-600 hover:text-brand focus:outline-none">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- MENU DESKTOP -->
        <div class="hidden md:flex items-center gap-8">
            <a href="{{ route('ads.index') }}" class="text-gray-500 hover:text-gray-900 font-semibold transition-colors">HOME</a>
            
            @auth
                <a href="{{ route('ads.create') }}" class="bg-brand hover-bg-brand text-white px-6 py-2.5 rounded-xl font-bold flex items-center gap-2 transition-all hover:scale-105 shadow-md shadow-emerald-50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    POST ADS
                </a>

                <div class="flex flex-col items-end group">
                    <p class="text-sm font-black text-gray-900 leading-none mb-1 group-hover:text-brand transition-colors">
                        {{ Auth::user()->name }}
                    </p>
                    <div class="flex items-center gap-2">
                        <div class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-brand opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-brand"></span>
                        </div>
                        <span class="text-[10px] font-bold uppercase tracking-widest text-brand">En ligne</span>
                    </div>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="group flex items-center gap-2 bg-slate-50 hover:bg-red-500 text-slate-700 hover:text-white px-4 py-2.5 rounded-xl border border-slate-200 transition-all duration-300">
                        <span class="text-xs font-bold uppercase tracking-wider">Logout</span>
                        <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="bg-brand hover-bg-brand text-white px-6 py-2.5 rounded-xl font-bold transition-all hover:scale-105 shadow-md">
                    Sign In
                </a>
            @endguest
        </div>
    </div>

    <!-- MENU MOBILE -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 py-4 px-4 space-y-4 shadow-xl">
        <a href="{{ route('ads.index') }}" class="block text-gray-600 font-bold">HOME</a>

        @auth
            <a href="{{ route('ads.create') }}" class="block bg-brand text-white text-center py-3 rounded-xl font-bold">POST ADS</a>
            <div class="border-t border-gray-100 pt-4">
                <p class="font-black text-gray-900">{{ Auth::user()->name }}</p>
                <p class="text-xs text-brand font-bold uppercase">En ligne</p>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-left text-red-500 font-bold py-2">LOGOUT</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block bg-brand text-white text-center py-3 rounded-xl font-bold">SIGN IN</a>
        @endauth
    </div>
</nav>

<script>
    const btn = document.getElementById('mobile-menu-button');
    const menu = document.getElementById('mobile-menu');
    if(btn && menu) {
        btn.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    }
</script>
