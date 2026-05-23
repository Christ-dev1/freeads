@extends('auth.userpage')

@section('main_content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        
        <!-- COLONNE FILTRES (À gauche) -->
        <aside class="lg:col-span-1">
            <div class="bg-white p-5 rounded-xl shadow-sm border border-gray-100 sticky top-24">
                <h2 class="font-bold text-lg mb-6 border-b pb-2">Filtres</h2>
                
                <form action="{{route('ads.index')}}" method="GET" class="space-y-6">

                    <!-- Category -->
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-gray-600">Catégorie</label>
                        <select name="category_id" onchange="this.form.submit()" class="w-full h-10 border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">Toutes les catégories</option>
                        
                        <!-- Categories proviennent de la bd -->
                        @foreach(\App\Models\Category::all() as $cat)
                            <option value="{{ $cat->id }}" onchange="this.form.submit()" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                        </select>
                    </div>

                    <!-- Location -->
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-gray-600">Localisation</label>
                        <input type="text" name="location"onblur="this.form.submit()" value="{{ request('location') }}" placeholder="Ville..." class="w-full border-gray-300 rounded-lg">
                    </div>

                    <!-- Price Range-->
                    <div>
                        <label class="block text-sm font-semibold mb-2 text-gray-700">Tranche de Prix</label>
                        <div class="flex items-center space-x-2">
                            <input type="number" name="min_price"onchange="this.form.submit()"   value="{{ request('min_price') }}" placeholder="min" class="w-full pl-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none text-sm">
                            <input type="number" name="max_price" onchange="this.form.submit()"  value="{{ request('max_price') }}" placeholder="max" class="w-full pl-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none text-sm">
                        </div>
                    </div>

                    <!-- Condition -->
                    <div class="space-y-2">
                        <label class="block text-sm font-semibold text-gray-600">État</label>
                        @foreach(['Neuf' => 'Neuf', 'Certifié' => 'Certifié', 'Occasion' => 'Occasion'] as $val => $label)
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="condition[]" value="{{ $val }}" {{ is_array(request('condition')) && in_array($val, request('condition')) ? 'checked' : '' }} 
                                class="rounded text-indigo-600" onchange="this.form.submit()">
                                <span class="text-sm text-gray-600">{{ $label }}</span>
                            </label>
                        @endforeach
                    </div>

                       {{-- BOUTON RÉINITIALISER --}}
                    <a href="{{ route('ads.index') }}" 
                    class="block w-full text-center bg-gray-100 text-gray-600 py-2.5 rounded-lg hover:bg-gray-200 transition font-medium text-sm">
                        Réinitialiser les filtres
                    </a>
                </form>
            </div>
        </aside>

        <!-- CONTENU (Au centre/droite) -->
        <main class="lg:col-span-3">
            @yield('product_grid')
        </main>
    </div>
</div>
@endsection
