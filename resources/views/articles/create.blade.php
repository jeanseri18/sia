@extends('layouts.app')

@section('content')
@include('sublayouts.article')

<div class="container">
@if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <h3>Ajouter un article</h3>
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Catégorie</label>
            <select name="categorie_id" class="form-control">
                @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Sous-catégorie</label>
            <select name="sous_categorie_id" class="form-control">
                <option value="">Aucune</option>
                @foreach ($sousCategories as $sousCategorie)
                    <option value="{{ $sousCategorie->id }}">{{ $sousCategorie->nom }}</option>
                @endforeach
            </select>
        </div>
        

        <div class="form-group">
            <label>Designation</label>
            <input type="text" name="nom" class="form-control">
        </div>
    
     
        <div class="form-group">
            <label>Unité de mesure</label>
            <select name="unite_mesure" class="form-control">
                <option value="">Sélectionner une unité</option>
                @foreach ($uniteMesures as $uniteMesure)
                    <option value="{{ $uniteMesure->id }}">{{ $uniteMesure->nom }}</option>
                @endforeach
            </select>
        </div>
 
        <button type="submit" class="btn btn-success mt-3">Ajouter</button>
    </form>
</div>
@endsection
