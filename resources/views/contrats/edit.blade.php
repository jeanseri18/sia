@extends('layouts.app')

@section('content')
@include('sublayouts.projetdetail')

    <div class="container">
        <h2>Modifier le contrat : {{ $contrat->nom_contrat }}</h2>

        <form action="{{ route('contrats.update', $contrat->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="ref_contrat">Référence du contrat</label>
                <input type="text" class="form-control" id="ref_contrat" name="ref_contrat" value="{{ $contrat->ref_contrat }}" required>
            </div>
            <div class="form-group">
                <label for="nom_contrat">Nom du contrat</label>
                <input type="text" class="form-control" id="nom_contrat" name="nom_contrat" value="{{ $contrat->nom_contrat }}" required>
            </div>
            <div class="form-group">
                <label for="date_debut">Date de début</label>
                <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ $contrat->date_debut }}" required>
            </div>
            <div class="form-group">
                <label for="date_fin">Date de fin</label>
                <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ $contrat->date_fin }}">
            </div>
            <div class="form-group">
                <label for="type_travaux">Type de travaux</label>
                <input type="text" class="form-control" id="type_travaux" name="type_travaux" value="{{ $contrat->type_travaux }}" required>
            </div>
            <div class="form-group">
                <label for="taux_garantie">Taux de garantie</label>
                <input type="number" step="0.01" class="form-control" id="taux_garantie" name="taux_garantie" value="{{ $contrat->taux_garantie }}" required>
            </div>
            <div class="form-group">
                <label for="client_id">Client</label>
                <select class="form-control" id="client_id" name="client_id" required>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}" @if($contrat->client_id == $client->id) selected @endif>{{ $client->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="montant">Montant</label>
                <input type="number" step="0.01" class="form-control" id="montant" name="montant" value="{{ $contrat->montant }}" required>
            </div>
            <div class="form-group">
                <label for="statut">Statut</label>
                <select class="form-control" id="statut" name="statut" required>
                    <option value="en cours" @if($contrat->statut == 'en cours') selected @endif>En cours</option>
                    <option value="terminé" @if($contrat->statut == 'terminé') selected @endif>Terminé</option>
                    <option value="annulé" @if($contrat->statut == 'annulé') selected @endif>Annulé</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour le contrat</
