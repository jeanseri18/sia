@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Ajouter un secteur</h2>

    <form action="{{ route('secteurs.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du secteur</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>

        <div class="mb-3">
            <label for="ville_id" class="form-label">Ville</label>
            <select class="form-select" id="ville_id" name="ville_id" required>
                <option value="" disabled selected>-- Sélectionner une ville --</option>
                @foreach ($villes as $ville)
                    <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('secteurs.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
