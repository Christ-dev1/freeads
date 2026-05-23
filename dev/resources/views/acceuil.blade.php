@extends('layouts.search')

@section('title', 'Liste des Modèles')

@section('product_grid')
    <div class="mb-6">
        <input type="text" name="query" placeholder="Chercher un mot clé..." class="w-full p-3 border-gray-300 rounded-xl shadow-sm focus:ring-indigo-500">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">
       {{-- @forelse($items as $item) --}}
            <div class="bg-white rounded-xl shadow-sm border overflow-hidden hover:shadow-md transition">
                <div class="h-40 bg-gray-200 flex items-center justify-center italic text-gray-400">Rendu Blender</div>
                <div class="p-4">layoutlayoutlayoutllayoutayout
                    <h3 class="font-bold text-gray-800">{{-- $item->name --}}</h3>
                    <p class="text-indigo-600 font-bold mt-2">{{-- $item->price --}} €</p>
                </div>
            </div>
        {{-- @empty --}}
            <div class="col-span-full text-center py-20">
                <p class="text-gray-500 text-lg">Aucun modèle trouvé pour votre recherche.</p>
            </div>
       {{-- @endforelse --}}
    </div>

    <div class="mt-12 py-4 border-t">
        {{-- $items->links() --}}
    </div>
 @endsection
