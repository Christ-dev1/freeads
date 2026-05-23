  <footer class="bg-gray-900 text-white mt-20">
    <div class="max-w-7xl mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            <!-- Colonne 1: À propos -->
            <div class="col-span-1 md:col-span-1">
                <h3 class="text-xl font-bold mb-4 text-brand">FreeAds</h3>
                <p class="text-gray-400 text-sm">
                    La plateforme n°1 pour acheter et vendre vos objets en toute sécurité. Trouvez les meilleures occasions près de chez vous.
                </p>
                <div class="flex space-x-4 mt-6">
                    <a href="#" class="text-gray-400 hover:text-brand transition"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-gray-400 hover:text-brand transition"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-gray-400 hover:text-brand transition"><i class="fab fa-instagram"></i></a>
                </div>
            </div>

            <!-- Colonne 2: Catégories Populaires (SEO) -->
            <div>
                <h3 class="font-bold mb-4 border-b border-gray-800 pb-2">Top Catégories</h3>
                <ul class="text-gray-400 text-sm space-y-2">
                    @foreach(\App\Models\Category::limit(5)->get() as $cat)
                        <li><a href="{{ route('ads.index', ['category_id' => $cat->id]) }}" class="hover:text-brand transition">{{ $cat->name ?? 'sans category' }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Colonne 3: Liens Utiles -->
            <div>
                <h3 class="font-bold mb-4 border-b border-gray-800 pb-2">Informations</h3>
                <ul class="text-gray-400 text-sm space-y-2">
                    <li><a href="#" class="hover:text-brand transition">Comment ça marche ?</a></li>
                    <li><a href="#" class="hover:text-brand transition">Conseils de sécurité</a></li>
                    <li><a href="#" class="hover:text-brand transition">Conditions Générales</a></li>
                    <li><a href="#" class="hover:text-brand transition">Contactez-nous</a></li>
                </ul>
            </div>

            <!-- Colonne 4: Newsletter -->
            <div>
                <h3 class="font-bold mb-4 border-b border-gray-800 pb-2">Newsletter</h3>
                <p class="text-gray-400 text-sm mb-4">Recevez les meilleures annonces par email.</p>
                <form class="flex flex-col space-y-2">
                    <input type="email" placeholder="Votre email" class="bg-gray-800 border-none rounded-lg p-2 text-sm focus:ring-2 focus:ring-brand outline-none">
                    <button type="submit" class="bg-brand hover-bg-brand text-white font-bold py-2 rounded-lg transition text-sm">
                        S'abonner
                    </button>
                </form>
            </div>
        </div>

        <hr class="border-gray-800 my-8">

        <!-- Copyright -->
        <div class="flex flex-col md:flex-row justify-between items-center text-gray-500 text-xs">
            <p>&copy; {{ date('Y') }} FreeAds Inc. Tous droits réservés.</p>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="#" class="hover:text-white">Mentions légales</a>
                <a href="#" class="hover:text-white">Confidentialité</a>
                <a href="#" class="hover:text-white">Sitemap</a>
            </div>
        </div>
    </div>
</footer>