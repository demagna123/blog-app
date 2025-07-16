<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
   public function create(Article $article)
{
    return view('commentaires.create', compact('article'));
}

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'article_id' => 'required|exists:articles,id',
        'nomauteur' => 'required|string|max:255',
        'messages' => 'required|string',
    ]);

    Commentaire::create($validated);

    return redirect()
        ->route('articles.show', $validated['article_id'])
        ->with('success', 'Commentaire ajouté avec succès !');
}

    /**
     * Display the specified resource.
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire)
    {
        //
    }
}
