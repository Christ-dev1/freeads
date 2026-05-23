<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'FreeAds')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans antialiased text-gray-900">

    <!-- HEADER -->
    <header class="bg-white shadow-sm border-b sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo / Nom -->
            <div class="flex-shrink-0 flex items-center">
                <a href="/" class="text-2xl font-bold text-red-600 flex items-center gap-2">
                    <h1 class="text-2xl font-bold text-indigo-600">FreeAds</h1>
                </a>
            </div>

            <!-- Navigation Droite -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="/" class="text-gray-600 hover:text-red-600 font-medium transition">Accueil</a>
                
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-red-600 font-medium">Mon Compte</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-red-600 font-medium">Connexion</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">S'inscrire</a>
                        @endif
                    @endauth
                @endif
            </nav>

            <!-- Menu Mobile (Optionnel) -->
            <div class="md:hidden flex items-center">
                <button class="text-gray-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</header>


    <!-- Point d'injection du contenu principal -->
    @yield('main_content')

</body>
</html>
