<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\SousCategorie;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['categorie', 'sousCategorie'])->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $categories = Categorie::all();
        $sousCategories = SousCategorie::all();
        return view('articles.create', compact('categories', 'sousCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reference' => 'required|unique:articles,reference',
            'nom' => 'required',
            'quantite_stock' => 'required|integer',
            'prix_unitaire' => 'required|numeric',
            'unite_mesure' => 'required',
            'cout_moyen_pondere' => 'required|numeric',
            'categorie_id' => 'required|exists:categories,id',
            'sous_categorie_id' => 'nullable|exists:souscategories,id',
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')->with('success', 'Article ajouté avec succès.');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $categories = Categorie::all();
        $sousCategories = SousCategorie::all();
        return view('articles.edit', compact('article', 'categories', 'sousCategories'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'reference' => 'required|unique:articles,reference,' . $article->id,
            'nom' => 'required',
            'quantite_stock' => 'required|integer',
            'prix_unitaire' => 'required|numeric',
            'unite_mesure' => 'required',
            'cout_moyen_pondere' => 'required|numeric',
            'categorie_id' => 'required|exists:categories,id',
            'sous_categorie_id' => 'nullable|exists:souscategories,id',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')->with('success', 'Article mis à jour avec succès.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article supprimé avec succès.');
    }
}
