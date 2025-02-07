@extends('layouts.app')

@section('content')
@include('sublayouts.projet')
<div class="container card" style="background:#F3F6F9 ;padding:20px;">
<h3 style="color:#033765">Modifier le projet</h3>

    <form action="{{ route('projets.update', $projet->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="ref_projet" class="form-label">Référence Projet</label>
            <input type="text" id="ref_projet" name="ref_projet" value="{{ $projet->ref_projet }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="date_creation" class="form-label">Date de création</label>
            <input type="date" id="date_creation" name="date_creation" value="{{ $projet->date_creation }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nom_projet" class="form-label">Nom du Projet</label>
            <input type="text" id="nom_projet" name="nom_projet" value="{{ $projet->nom_projet }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control">{{ $projet->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="date_debut" class="form-label">Date de début</label>
            <input type="date" id="date_debut" name="date_debut" value="{{ $projet->date_debut }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="date_fin" class="form-label">Date de fin</label>
            <input type="date" id="date_fin" name="date_fin" value="{{ $projet->date_fin }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="client" class="form-label">Client</label>
            <select id="client" name="client" class="form-select" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ $projet->client == $client->prenoms ? 'selected' : '' }}>{{ $client->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="secteur_activite_id" class="form-label">Secteur d'activité</label>
            <select id="secteur_activite_id" name="secteur_activite_id" class="form-select" required>
                @foreach($secteurs as $secteur)
                    <option value="{{ $secteur->id }}" {{ $projet->secteur_activite_id == $secteur->id ? 'selected' : '' }}>{{ $secteur->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="conducteur_travaux" class="form-label">Conducteur de travaux</label>
            <input type="text" id="conducteur_travaux" name="conducteur_travaux" value="{{ $projet->conducteur_travaux }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hastva" class="form-label">TVA applicable ?</label>
            <select id="hastva" name="hastva" class="form-select">
                <option value="0" {{ !$projet->hastva ? 'selected' : '' }}>Non</option>
                <option value="1" {{ $projet->hastva ? 'selected' : '' }}>Oui</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="statut" class="form-label">Statut</label>
            <select id="statut" name="statut" class="form-select" required>
                <option value="en cours" {{ $projet->statut == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="terminé" {{ $projet->statut == 'terminé' ? 'selected' : '' }}>Terminé</option>
                <option value="annulé" {{ $projet->statut == 'annulé' ? 'selected' : '' }}>Annulé</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="bu_id" class="form-label">Business Unit (BU)</label>
            <select id="bu_id" name="bu_id" class="form-select" required>
                @foreach($bus as $bu)
                    <option value="{{ $bu->id }}" {{ $projet->bu_id == $bu->id ? 'selected' : '' }}>{{ $bu->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Mettre à jour</button>
    </form></div>
@endsection
