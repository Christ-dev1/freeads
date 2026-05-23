@extends('../auth.userpage')
@section('title')
Publier une annonce
@endsection

@section('main_content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-6">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Publier une nouvelle annonce
                </h2>
    
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('ads.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    {{-- Titre --}}
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Titre de l'annonce</label>
                        <input type="text" name="title" value="{{ old('title') }}" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 border p-2" required placeholder="Ex: Figurine collector...">
                        @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {{-- Catégorie --}}
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Catégorie</label>
                            <select name="category_id" id="category_select" class="w-full border-gray-300 rounded-md shadow-sm border p-2">
                                <option value="">-- Sélectionner --</option>
                                @foreach(\App\Models\Category::all() as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->name ?? 'pas encore de categorie' }}
                                    </option>
                                @endforeach
                                <option value="new" {{ old('category_id') == 'new' ? 'selected' : '' }}>+ Ajouter une nouvelle catégorie</option>
                            </select>

                            @error('category') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        {{-- Champ caché qui s'affiche si on veut créer une nouvelle catégorie --}}
                        <div id="new_category_input" class="mb-4 hidden">
                            <label class="block font-medium text-sm text-gray-700">Nom de la nouvelle catégorie</label>
                            <input type="text" name="new_category_name" class="w-full border p-2 rounded" placeholder="Ex: Instruments de musique">
                        </div>

                        {{-- ÉTAT (CONDITION) --}}
                        <div>
                            <label class="block font-medium text-sm text-gray-700">État de l'objet</label>
                            <select name="condition" class="w-full border-gray-300 rounded-md shadow-sm border p-2" required>
                                <option value="">-- Sélectionner --</option>
                                <option value="Neuf" {{ old('condition') == 'Neuf' ? 'selected' : '' }}>Neuf</option>
                                <option value="Certifié" {{ old('condition') == 'certifiért' ? 'selected' : '' }}>Certifié (Excellent)</option>
                                <option value="Occasion" {{ old('condition') == 'Occasion' ? 'selected' : '' }}>Occasion</option>
                            </select>
                            @error('condition') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        {{-- Prix --}}
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Prix (€)</label>
                            <input type="number" step="0.01" name="price" value="{{ old('price') }}" class="w-full border-gray-300 rounded-md shadow-sm border p-2" required placeholder="0.00">
                            @error('price') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block font-medium text-sm text-gray-700">Description</label>
                        <textarea name="description" rows="4" class="w-full border-gray-300 rounded-md shadow-sm border p-2" required placeholder="Détaillez votre annonce...">{{ old('description') }}</textarea>
                        @error('description') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Localisation --}}
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Ville / Localisation</label>
                            <input type="text" name="location" value="{{ old('location') }}" class="w-full border-gray-300 rounded-md shadow-sm border p-2" required placeholder="Ex: Paris, Lyon...">
                            @error('location') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        {{-- Photo --}}
                        <div>
                            <label class="block font-medium text-sm text-gray-700">Photo principale</label>
                            <input type="file" name="photo" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
                            <p class="text-gray-400 text-[10px] mt-1">Formats acceptés : JPG, PNG (Max 2Mo)</p>
                            @error('photo') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    {{-- Bouton --}}
                    <div class="flex items-center justify-end mt-6 border-t pt-4">
                        <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 shadow-md transition font-semibold">
                            Publier l'annonce
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection    

@section('script_js')
<script>
    const categorySelect = document.getElementById('category_select');
    const newInputDiv = document.getElementById('new_category_input');

    function toggleNewCategory() {
        if (categorySelect.value === 'new') {
            newInputDiv.classList.remove('hidden');
        } else {
            newInputDiv.classList.add('hidden');
        }
    }

   categorySelect.addEventListener('change', toggleNewCategory);

    window.addEventListener('load', toggleNewCategory);
</script>

@endsection

