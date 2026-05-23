<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class AdController extends Controller
{
    /**
     * Affiche la liste des annonces (Homepage)
     */
    public function index(Request $request)
{
    $query = Ad::query();

    if ($request->filled('category_id')) {
        $query->where('category_id', $request->category_id);
    }


    if ($request->filled('location')) {
        $query->where('location', 'like', '%' . $request->location . '%');
    }


    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }


    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }


  
if ($request->filled('condition') && is_array($request->condition)) {
    
    $query->whereIn('condition', $request->condition);
}



if ($request->filled('search')) {
    $searchTerm = $request->search;
    

    $query->where(function($q) use ($searchTerm) {
        $q->where('title', 'LIKE', '%' . $searchTerm . '%')
          ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
          
    });
}



    $ads = $query->with(['user', 'category'])->latest()->paginate(3)->appends($request->all());


    return view('ads.index', compact('ads'));
}

    /**
     * Affiche le formulaire de création
     */
    public function create()
    {
        return view('ads.create');
    }

    /**
     * Enregistre l'annonce dans la base de données
     */
    public function store(Request $request)
{

    $validated = $request->validate([
        'title'             => 'required|string|max:255',
        'category_id'       => 'nullable|string',
        'new_category_name' => 'nullable|string|max:50',
        'description'       => 'required|string',
        'photo'             => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'price'             => 'required|numeric|min:0',
        'location'          => 'required|string',
        'condition'         => 'required|in:Neuf,Certifié,Occasion',
    ]);


    $categoryId = $request->category_id;

    if ($request->category_id === 'new' && $request->filled('new_category_name')) {

        $category = \App\Models\Category::firstOrCreate([
            'name' => ucfirst(strtolower($request->new_category_name))
        ]);
        $categoryId = $category->id;
    }


    if ($request->hasFile('photo')) {
        $validated['photo'] = $request->file('photo')->store('ads_photos', 'public');
    }


    Ad::create([
        'title'       => $validated['title'],
        'category_id' => $categoryId,
        'description' => $validated['description'],
        'condition'   => $validated['condition'],
        'price'       => $validated['price'],
        'location'    => $validated['location'],
        'photo'       => $validated['photo'],
        'user_id'     => Auth::id(),
    ]);

    return redirect()->route('ads.index')->with('success', 'Annonce publiée avec succès !');
}


    /**
     * Affiche une annonce spécifique (Détails)
     */
    public function show(Ad $ad)
    {

        $ad->load(['user', 'category']);
        return view('ads.show', compact('ad'));
    }

    
public function edit(Ad $ad)
{
    if($ad->user_id !== Auth::id()){
            abort(403, 'Action non autorisée.');
        }

    return view('ads.edit', compact('ad'));
}



 public function update(Request $request, Ad $ad)
    {
        if ($ad->user_id !== Auth::id()) {
        abort(403);
       }
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'category_id'    => 'required|string',
            'description' => 'required|string',
            'condition'   => 'required|string',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price'       => 'required|numeric|min:0',
            'location'    => 'required|string',
            
        ]);

        if ($request->hasFile('photo')) {

            if ($ad->photo) {
                Storage::disk('public')->delete($ad->photo);
            }
            $path = $request->file('photo')->store('ads_photos', 'public');
            $validated['photo'] = $path;
        }

        $ad->update($validated);

        return redirect()->route('ads.liste')->with('success', 'Annonce mise à jour !');
    }

    public function destroy(Ad $ad)
    {
        if($ad->user_id !== Auth::id()){
            abort(403, 'Action non autorisée.');
        }
        if ($ad->photo) {
            Storage::disk('public')->delete($ad->photo);
        }
        $ad->delete();
        return redirect()->route('ads.liste')->with('success', 'Produit supprimé !');
    }

    public function list()
    {


        $ads = Ad::where('user_id', Auth::id())->latest()->paginate(3);
        return view('ads.liste', compact('ads'));
    }
}
