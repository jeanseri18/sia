@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier la Facture</h2>
    <form action="{{ route('factures.update', $facture->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Numéro de Facture</label>
            <input type="text" name="num" class="form-control" value="{{ $facture->num }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Prestation (optionnel)</label>
            <select name="id_prestation" class="form-control">
                <option value="">Sélectionner</option>
                @foreach($prestations as $prestation)
                    <option value="{{ $prestation->id }}" {{ $facture->id_prestation == $prestation->id ? 'selected' : '' }}>
                        {{ $prestation->artisan->nom }} - {{ $prestation->montant }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Contrat (optionnel)</label>
            <select name="id_contrat" class="form-control">
                <option value="">Sélectionner</option>
                @foreach($contrats as $contrat)
                    <option value="{{ $contrat->id }}" {{ $facture->id_contrat == $contrat->id ? 'selected' : '' }}>
                        {{ $contrat->nom_contrat }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Artisan</label>
            <select name="id_artisan" class="form-control">
                @foreach($artisans as $artisan)
                    <option value="{{ $artisan->id }}" {{ $facture->id_artisan == $artisan->id ? 'selected' : '' }}>
                        {{ $artisan->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Montant</label>
            <input type="number" name="montant" class="form-control" value="{{ $facture->montant }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Décompte (optionnel)</label>
            <input type="number" name="decompte" class="form-control" value="{{ $facture->decompte }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Retenue (optionnel)</label>
            <input type="number" name="retenue" class="form-control" value="{{ $facture->retenue }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Date d'émission</label>
            <input type="date" name="date_emission" class="form-control" value="{{ $facture->date_emission }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Statut</label>
            <input type="text" name="statut" class="form-control" value="{{ $facture->statut }}" required>
        </div>
        <button type="submit" class="btn btn-warning">Mettre à jour</button>
    </form>
</div>
@endsection
