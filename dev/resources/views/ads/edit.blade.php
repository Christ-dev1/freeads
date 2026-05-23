@extends('../auth.userpage')

@section('title')
Modification
@endsection

@section('main_content')
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold mb-2 text-gray-800 text-uppercase">MODIFIER : {{ $ad->title }}</h1>
        <p class="text-gray-500 mb-6 italic">ID de l'annonce : #{{ $ad->id }}</p>
        <hr class="mb-8">

        <form action="{{ route('ads.update', $ad->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            
            <div>
                <label class="block font-semibold mb-1">Titre du produit</label>
                <input type="text" name="title" value="{{ old('title', $ad->title) }}" class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold mb-1">Catégorie</label>
                    <select name="category_id" class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-500 outline-none" required>
                    @foreach(\App\Models\Category::all() as $cat)
                        <option value="{{ $cat->id }}" {{ $ad->category_id == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name ?? 'sans categorie' }}
                        </option>
                    @endforeach
                    </select>
                </div>

                <div>
                    <label class="block font-semibold mb-1">État de l'objet</label>
                    <select name="condition" class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-500 outline-none" required>
                        <option value="Neuf" {{ $ad->condition == 'Neuf' ? 'selected' : '' }}>Neuf</option>
                        <option value="Certifié" {{ $ad->condition == 'Certifié' ? 'selected' : '' }}>Certifié</option>
                        <option value="Occasion" {{ $ad->condition == 'Occasion' ? 'selected' : '' }}>Occasion</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block font-semibold mb-1">Prix (€)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $ad->price) }}" class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-500 outline-none" required>
                </div>

                <div>
                    <label class="block font-semibold mb-1">Localisation</label>
                    <input type="text" name="location" value="{{ old('location', $ad->location) }}" class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-500 outline-none" required>
                </div>
            </div>

            <div>
                <label class="block font-semibold mb-1">Description</label>
                <textarea name="description" rows="4" class="border p-2 w-full rounded focus:ring-2 focus:ring-blue-500 outline-none" required>{{ old('description', $ad->description) }}</textarea>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg border border-dashed border-gray-300">
                <label class="block font-semibold mb-2">Photo de l'annonce</label>
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('storage/' . $ad->photo) }}" class="w-20 h-20 object-cover rounded shadow-sm border bg-white" alt="actuelle">
                    <div class="flex-1">
                        <span class="text-xs text-gray-500 block mb-1">Changer la photo (laisser vide pour conserver l'actuelle) :</span>
                        <input type="file" name="photo" class="text-sm w-full file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                    </div>
                </div>
            </div>

            <div class="flex items-center pt-4">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-6 py-2 rounded shadow transition duration-200">
                     METTRE À JOUR
                </button>
                <a href="{{ route('ads.liste') }}" class="ml-4 text-gray-400 hover:text-gray-600 underline text-sm transition">Annuler</a>
            </div>
        </form>
    </div>

 @endsection
