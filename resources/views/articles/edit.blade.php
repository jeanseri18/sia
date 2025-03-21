@extends('layouts.app')

@section('content')
@include('sublayouts.article')

<div class="container">
    <h3>Modifier l'article</h3>
    <form action="{{ route('articles.update', $article) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Catégorie</label>
            <select name="categorie_id" class="form-control">
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ $article->categorie_id == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label>Sous-catégorie</label>
            <select name="sous_categorie_id" class="form-control">
                <option value="">Aucune</option>
                @foreach ($sousCategories as $sousCategorie)
                    <option value="{{ $sousCategorie->id }}" {{ $article->sous_categorie_id == $sousCategorie->id ? 'selected' : '' }}>
                        {{ $sousCategorie->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Référence</label>
            <input type="text" name="reference" class="form-control" value="{{ old('reference', $article->reference) }}">
        </div>
        
        <div class="form-group">
            <label>Designation</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $article->nom) }}">
        </div>
        
        <div class="form-group">
            <label>Quantité Stock</label>
            <input type="number" name="quantite_stock" class="form-control" value="{{ old('quantite_stock', $article->quantite_stock) }}">
        </div>
        
        <div class="form-group">
            <label>Prix Unitaire</label>
            <input type="number" name="prix_unitaire" class="form-control" value="{{ old('prix_unitaire', $article->prix_unitaire) }}">
        </div>
        
        <div class="form-group">
            <label>Unité de mesure</label>
            <input type="text" name="unite_mesure" class="form-control" value="{{ old('unite_mesure', $article->unite_mesure) }}">
        </div>
        
        <div class="form-group">
            <label>Coût Moyen Pondéré</label>
            <input type="number" name="cout_moyen_pondere" class="form-control" value="{{ old('cout_moyen_pondere', $article->cout_moyen_pondere) }}">
        </div>
        

        <button type="submit" class="btn btn-success mt-3">Mettre à jour</button>
        <a href="{{ route('articles.index') }}" class="btn btn-secondary mt-3">Annuler</a>
    </form>
</div>
@endsection
