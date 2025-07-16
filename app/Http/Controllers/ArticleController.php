<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Like;
use Illuminate\Pagination\Paginator;


class ArticleController extends Controller
{

        public function like($id)
{
    $article = Article::findOrFail($id);

    // Créer un like (tu peux ignorer si doublon n'est pas un problème)
    Like::create(['article_id' => $id]);

    // Incrémenter le compteur
    $article->increment('likes_count');

    return redirect()->route('articles.index');
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $articles = Article::orderBy('likes_count', 'desc')->paginate(10);
    return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    // 1. Validation des données
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'prix' => 'required|string',
        'categorie' => 'required|string|max:255',
        'quantite' => 'required|string',
        'description' => 'nullable|string',
        'photo' => 'nullable|image|max:6144', 
    ]);

    // 2. Gestion de la photo (si elle existe)
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('photos', 'public');
        $validated['photo'] = $path;
    }

    // 3. Création de l'article
    Article::create($validated);

    // 4. Redirection ou réponse JSON
    return redirect()->route('articles.index')->with('success', 'Article créé avec succès !');
}

    /**
     * Display the specified resource.
     */

       public function show($id)
    {
    $article = Article::with('commentaires')->findOrFail($id);
    return view('articles.show', compact('article'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
