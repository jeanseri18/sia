@extends('layouts.app')

@section('content')
@include('sublayouts.projetdetail')

    <div class="container">
        <h2>Modifier le produit : {{ $stock->article->nom }}</h2>

        <form action="{{ route('stock.update', $stock->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="article_id">Sélectionner un article</label>
                <select class="form-control" id="article_id" name="article_id" required>
                    <option value="">-- Sélectionnez un article --</option>
                    @foreach($articles as $article)
                        <option value="{{ $article->id }}" {{ $article->id == $stock->article_id ? 'selected' : '' }}>
                            {{ $article->nom }} - {{ $article->reference }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantite">Quantité</label>
                <input type="number" class="form-control" id="quantite" name="quantite" value="{{ $stock->quantite }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
