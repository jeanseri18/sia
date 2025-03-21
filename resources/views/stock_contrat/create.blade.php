@extends('layouts.app')


@section('content')
@include('sublayouts.contrat')
    <div class="container">
        <h3>Ajouter un produit au stock</h3>

        <form action="{{ route('stock_contrat.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="article_id">Sélectionner un article</label>
                <select class="form-control" id="article_id" name="article_id" required>
                    <option value="">-- Sélectionnez un article --</option>
                    @foreach($articles as $article)
                        <option value="{{ $article->id }}">{{ $article->nom }} - {{ $article->reference }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="quantite">Quantité</label>
                <input type="number" class="form-control" id="quantite" name="quantite" required>
            </div>
<br>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
@endsection
