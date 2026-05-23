
@extends('layouts.search')

@section('product_grid')
<div class="flex flex-col md:flex-row items-center justify-between gap-4 mb-8">
    
    @auth
    <div class="w-full md:w-auto">
        <a href="{{ route('ads.liste') }}" class="inline-flex items-center px-5 py-3 bg-indigo-600 text-white font-semibold rounded-xl shadow-sm hover:bg-indigo-700 transition w-full md:w-auto justify-center">
            <svg xmlns="http://www.w3.org" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d=" prisoner 19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
            </svg>
            Gérer mes annonces
        </a>
    </div>
    @endauth

     <div class="flex-1 w-full">
    <form action="{{ route('ads.index') }}" method="GET" class="relative">
        
        
        @if(request('category')) <input type="hidden" name="category" value="{{ request('category') }}"> @endif
        @if(request('min_price')) <input type="hidden" name="min_price" value="{{ request('min_price') }}"> @endif
        @if(request('max_price')) <input type="hidden" name="max_price" value="{{ request('max_price') }}"> @endif
        @if(request('location')) <input type="hidden" name="location" value="{{ request('location') }}"> @endif

        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
        </span>
        
        <input type="text" name="search" value="{{ request('search') }}" 
            placeholder="Chercher un mot clé (titre, description)..." 
            class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl shadow-sm focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition"
            onkeypress="if(event.keyCode == 13) { this.form.submit(); }">
            
        <button type="submit" class="absolute inset-y-0 right-0 pr-3 flex items-center text-indigo-500 font-bold hover:text-indigo-700">
            OK
        </button>
    </form>
</div>

</div>


@forelse($ads as $ad)
<a href="{{ route('ads.show', $ad->id) }}" class="block transition hover:opacity-90">
    <div class="ad-card">
<img src="{{ asset('storage/' . $ad->photo) }}" alt="image" class="ad-image" style="width:150px; height:150px; object-fit:cover;">      <div class="ad-content">
        <div class="ad-header">
          <h3 class="ad-title">{{ $ad->title }}</h3>
          <div class="ad-price">{{ $ad->price }}€</div>
        </div>

        <p class="ad-description">{{ Str::limit($ad->description, 100) }}</p>

        <div class="ad-tags">
            <span class="tag">{{ $ad->condition }}</span>
            <span class="tag">{{ $ad->category->name ?? 'sans categorie' }}</span>
            <span class="tag" style="background:none;">📍 {{ $ad->location }}</span>
        </div>

        <div class="ad-footer">
            <div class="user-info">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($ad->user->name ?? 'U') }}" alt="User" class="user-avatar">
                <span>{{ $ad->user->name ?? 'ANONYME' }}</span>
            </div>
            <div class="ad-date">{{ $ad->created_at->format('Y-m-d') }}</div>
        </div>
      </div>
    </div>
</a>
@empty
  <div class="col-span-full text-center py-20">
       <p class="text-gray-500 text-lg">Aucun modèle trouvé pour votre recherche.</p>
            <a href="{{ route('ads.index') }}" class="block text-center text-xs text-gray-400 hover:text-gray-600 mt-4 underline">
            Réinitialiser les filtres
            </a>
   </div>
@endforelse
    <div class="mt-12 py-4 border-t">
        {{ $ads->links() }}
    </div>

@endsection



