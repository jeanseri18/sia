@extends('layouts.app')

@section('content')
@include('sublayouts.projet')
@if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
<div class="container card" style="background:#F3F6F9 ;padding:20px;">
<h3 style="color:#033765">Créer un projet</h3>

    <form action="{{ route('projets.store') }}" method="POST">
        @csrf
     

        <div class="mb-3">
            <label for="date_creation" class="form-label">Date de création</label>
            <input type="date" id="date_creation" name="date_creation" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="nom_projet" class="form-label">Nom du Projet</label>
            <input type="text" id="nom_projet" name="nom_projet" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <label for="date_debut" class="form-label">Date de début</label>
            <input type="date" id="date_debut" name="date_debut" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="date_fin" class="form-label">Date de fin</label>
            <input type="date" id="date_fin" name="date_fin" class="form-control">
        </div>

        <div class="mb-3">
            <label for="client" class="form-label">Client</label>
            <select id="client" name="client" class="form-select" required>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->prenoms }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="secteur_activite_id" class="form-label">Secteur d'activité</label>
            <select id="secteur_activite_id" name="secteur_activite_id" class="form-select" required>
                @foreach($secteurs as $secteur)
                    <option value="{{ $secteur->id }}">{{ $secteur->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="conducteur_travaux" class="form-label">Conducteur de travaux</label>
            <input type="text" id="conducteur_travaux" name="conducteur_travaux" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hastva" class="form-label">TVA applicable ?</label>
            <select id="hastva" name="hastva" class="form-select">
                <option value="0">Non</option>
                <option value="1">Oui</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="statut" class="form-label">Statut</label>
            <select id="statut" name="statut" class="form-select" required>
                <option value="en cours">En cours</option>
                <option value="terminé">Terminé</option>
                <option value="annulé">Annulé</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="bu_id" class="form-label">Business Unit (BU)</label>
            <select id="bu_id" name="bu_id" class="form-select" required>
                @foreach($bus as $bu)
                    <option value="{{ $bu->id }}">{{ $bu->nom }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
