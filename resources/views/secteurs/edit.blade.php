@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Modifier le secteur</h2>

    <form action="{{ route('secteurs.update', $secteur->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom du secteur</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $secteur->nom }}" required>
        </div>

        <div class="mb-3">
            <label for="ville_id" class="form-label">Ville</label>
            <select class="form-select" id="ville_id" name="ville_id" required>
                @foreach ($villes as $ville)
                    <option value="{{ $ville->id }}" {{ $secteur->ville_id == $ville->id ? 'selected' : '' }}>
                        {{ $ville->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('secteurs.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
