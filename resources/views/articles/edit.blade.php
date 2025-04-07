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
            <label>Unité de mesure</label>
            <select name="unite_mesure" class="form-control">
                <option value="">Sélectionner une unité</option>
                @foreach ($uniteMesures as $uniteMesure)
                    <option value="{{ $uniteMesure->id }}" {{ $article->unite_mesure == $uniteMesure->id ? 'selected' : '' }}>
                        {{ $uniteMesure->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label>Référence</label>
            <input type="text" name="reference" class="form-control" value="{{ old('reference', $article->reference) }}" readonly>
        </div>
        
        <div class="form-group">
            <label>Designation</label>
            <input type="text" name="nom" class="form-control" value="{{ old('nom', $article->nom) }}">
        </div>
        
        <div class="form-group">
            <label>Quantité Stock</label>
            <input type="number" name="quantite_stock" class="form-control" value="{{ old('quantite_stock', $article->quantite_stock) }}" readonly>
        </div>
        
        <div class="form-group">
            <label>Prix Unitaire</label>
            <input type="number" name="prix_unitaire" class="form-control" value="{{ old('prix_unitaire', $article->prix_unitaire) }}" readonly>
        </div>
        
        <div class="form-group">
            <label>Unité de mesure</label>
            <input type="text" name="unite_mesure" class="form-control" value="{{ old('unite_mesure', $article->unite_mesure) }}">
        </div>
        
       
        

        <button type="submit" class="btn btn-success mt-3">Mettre à jour</button>
        <a href="{{ route('articles.index') }}" class="btn btn-secondary mt-3">Annuler</a>
    </form>
</div>
@endsection
