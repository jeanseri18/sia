@extends('layouts.app')

@section('content')

@include('sublayouts.until')
<div class="container card" style="background:#F3F6F9 ;padding:20px;">
<h3 style="color:#033765">Créer une nouvelle sous-catégorie</h3>

    <form action="{{ route('sous_categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom de la sous-catégorie</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select name="categorie_id" id="categorie_id" class="form-control" required>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer</button>
    </form></div>
@endsection
