@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier la Prestation</h2>
    <form action="{{ route('prestations.update', $prestation->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Artisan</label>
            <select name="id_artisan" class="form-control" required>
                @foreach($artisans as $artisan)
                    <option value="{{ $artisan->id }}" {{ $prestation->id_artisan == $artisan->id ? 'selected' : '' }}>
                        {{ $artisan->nom }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Contrat</label>
            <select name="id_contrat" class="form-control" required>
                @foreach($contrats as $contrat)
                    <option value="{{ $contrat->id }}" {{ $prestation->id_contrat == $contrat->id ? 'selected' : '' }}>
                        {{ $contrat->nom_contrat }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Prestation</label>
            <input type="number" name="prestation_titre" class="form-control" value="{{ $prestation->prestation }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Detail</label>
            <input type="number" name="detail" class="form-control" value="{{ $prestation->detail }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Statut</label>
            <select name="statut" class="form-control">
                <option value="En cours" {{ $prestation->statut == 'En cours' ? 'selected' : '' }}>En cours</option>
                <option value="Terminée" {{ $prestation->statut == 'Terminée' ? 'selected' : '' }}>Terminée</option>
                <option value="Annulée" {{ $prestation->statut == 'Annulée' ? 'selected' : '' }}>Annulée</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Mettre à jour</button>
    </form>
</div>
@endsection
