@extends('../auth.userpage')

@section('title')
Liste
@endsection

@section('main_content')
    <div class="max-w-6xl mx-auto mt-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-gray-800">GESTION DES PRODUITS</h1>
                <p class="text-gray-500">Interface d'administration de vos annonces</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('ads.index') }}" class="px-5 py-2.5 bg-white border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-medium shadow-sm">
                    <i class="fa-solid fa-house mr-2"></i> Accueil
                </a>
                <a href="{{ route('ads.create') }}" class="px-5 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-medium shadow-sm">
                    <i class="fa-solid fa-plus mr-2"></i> Ajouter un produit
                </a>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-200">
                        <th class="px-6 py-4 text-sm font-bold text-gray-700 uppercase">#</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700 uppercase">Produit</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700 uppercase">Categorie</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700 uppercase hidden md:table-cell">Description</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700 uppercase">Condition</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700 uppercase">Prix</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700 uppercase text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($ads as $ad)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 text-gray-600 font-mono text-sm">{{ $ad->id }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('storage/' . $ad->photo) }}" class="w-12 h-12 rounded-lg object-cover border border-gray-200 shadow-sm">
                                <span class="font-semibold text-gray-800">{{ $ad->title }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600 font-mono text-sm">{{ $ad->category->name ?? 'sans categorie' }}</td>
                        <td class="px-6 py-4 text-gray-500 text-sm hidden md:table-cell">
                            {{ Str::limit($ad->description, 60) }}
                        </td>
                        <td class="px-6 py-4 text-gray-600 font-mono text-sm">{{ $ad->condition }}</td>
                        <td class="px-6 py-4 font-bold text-green-600">
                            {{ $ad->price }}€
                        </td>
                        <td class="px-6 py-4 text-center">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('ads.edit', $ad->id) }}" class="p-2 bg-blue-100 text-blue-600 rounded-lg hover:bg-blue-600 hover:text-white transition shadow-sm" title="Modifier">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>

                                <form action="{{ route('ads.destroy', $ad->id) }}" method="POST" onsubmit="return confirm('Es-tu sûr de vouloir supprimer ce produit ? cette action est irréversible');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 bg-red-100 text-red-600 rounded-lg hover:bg-red-600 hover:text-white transition shadow-sm" title="Supprimer">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            @if($ads->isEmpty())
            <div class="p-10 text-center text-gray-400">
                <i class="fa-solid fa-box-open text-4xl mb-3"></i>
                <p>Aucun produit trouvé dans la base de données.</p>
            </div>
            @endif
        </div>
    </div>
    <div class="mt-12 py-4 border-t">
        {{ $ads->links() }}
    </div>

@endsection
