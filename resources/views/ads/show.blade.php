@extends('../auth.userpage')

@section('title')
{{$ad->title}}
@endsection

@section('main_content')

    <nav class="bg-white shadow-sm p-4 mb-6 flex justify-between items-start">
        <div class="max-w-6xl ">
            <a href="{{ route('ads.index') }}" class="text-green-600 font-bold text-xl">Freeads</a>
        </div>
         @auth
           @if($ad->user_id === Auth::id())
         <div class="flex space-x-2">
            <a href="{{ route('ads.edit', $ad->id) }}" class="text-blue-500">Modifier</a>
            <form action="{{ route('ads.destroy', $ad->id) }}" method="POST">
                @csrf @method('DELETE')
                <button type="submit" class="text-red-500">Supprimer</button>
            </form>
        </div>
           @endif
        @endauth
    </nav>

    <main class="max-w-6xl mx-auto px-4 pb-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                    <img src="{{ asset('storage/' . $ad->photo) }}" alt="{{ $ad->title }}" class="w-full h-[500px] object-cover">

                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h1 class="text-3xl font-bold text-gray-800">{{ $ad->title }}</h1>
                            <span class="bg-green-500 text-white px-4 py-2 rounded-lg font-bold text-xl">
                                {{ $ad->price }}€
                            </span>
                        </div>

                        <div class="flex gap-2 mb-6 text-sm text-gray-500">
                            <span class="bg-gray-100 px-3 py-1 rounded">{{$ad->condition}}</span>
                            <span class="bg-gray-100 px-3 py-1 rounded">{{ $ad->category->name ?? 'Sans catégorie' }}</span>
                            <span class="px-3 py-1">📍 {{ $ad->location }}</span>
                </div>

                 <hr class="my-6">

                 <h2 class="text-xl font-semibold mb-4 text-gray-800">Description</h2>
                 <p class="text-gray-600 leading-relaxed whitespace-pre-line">
                    {{ $ad->description }}
                 </p>
            </div>
        </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h2 class="text-lg font-bold mb-6">Vendeur</h2>

                    <div class="flex items-center gap-4 mb-8">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($ad->user->name ?? 'U') }}&background=random"
                             alt="Avatar" class="w-16 h-16 rounded-full object-cover">
                        <div>
                            <p class="font-bold text-gray-800 text-lg">{{ $ad->user->name ?? 'Anonyme' }}</p>
                            <p class="text-gray-400 text-sm italic">Membre depuis {{ $ad->user->created_at->format('Y') }}</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <button class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 rounded-lg flex items-center justify-center gap-2 transition">
                            <i class="fa-regular fa-comment-dots"></i> Envoyer un message
                        </button>

                        <button onclick="this.innerHTML = '📞 {{ $ad->user->telephone ?? 'Non renseigné' }}'"
                        class="w-full bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-3 rounded-lg flex items-center justify-center gap-2 transition">
                            <i class="fa-solid fa-phone"></i> Afficher le téléphone
                        </button>

                        <a href="mailto:{{ $ad->user->email }}"
                           class="w-full bg-white border border-gray-300 hover:bg-gray-50 text-gray-700 font-semibold py-3 rounded-lg flex items-center justify-center gap-2 transition">
                            <i class="fa-regular fa-envelope"></i> Envoyer un email
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                    <h2 class="font-bold text-gray-800 mb-4">Conseils de sécurité</h2>
                    <ul class="text-sm text-gray-600 space-y-3">
                        <li class="flex gap-2"><span>•</span> Rencontrez le vendeur en lieu public</li>
                        <li class="flex gap-2"><span>•</span> Vérifiez l'article avant le paiement</li>
                        <li class="flex gap-2"><span>•</span> Ne payez jamais à l'avance</li>
                        <li class="flex gap-2"><span>•</span> Méfiez-vous des offres trop alléchantes</li>
                    </ul>
                </div>
            </div>

        </div>
    </main>

@endsection
