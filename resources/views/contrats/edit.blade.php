@extends('layouts.app')

@section('content')
@include('sublayouts.projetdetail')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <h2>Modifier le contrat : {{ $contrat->nom_contrat }}</h2>

    <form action="{{ route('contrats.update', $contrat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Référence du contrat -->
        <div class="form-group">
            <label for="ref_contrat">Référence du contrat</label>
            <input type="text" class="form-control" id="ref_contrat" name="ref_contrat" value="{{ old('ref_contrat', $contrat->ref_contrat) }}" required>
        </div>

        <!-- Nom du contrat -->
        <div class="form-group">
            <label for="nom_contrat">Nom du contrat</label>
            <input type="text" class="form-control" id="nom_contrat" name="nom_contrat" value="{{ old('nom_contrat', $contrat->nom_contrat) }}" required>
        </div>

        <!-- Date de début -->
        <div class="form-group">
            <label for="date_debut">Date de début</label>
            <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ old('date_debut', $contrat->date_debut) }}" required>
        </div>

        <!-- Date de fin -->
        <div class="form-group">
            <label for="date_fin">Date de fin</label>
            <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ old('date_fin', $contrat->date_fin) }}">
        </div>

        <div class="form-group">
    <label for="type_travaux">Type de travaux</label>
    <select name="type_travaux" id="type_travaux" class="form-control" required>
        <option value="">Sélectionner un type de travaux</option>
        @foreach ($typeTravaux as $type)
            <option value="{{ $type->nom }}" {{ old('type_travaux', $contrat->type_travaux) == $type->nom ? 'selected' : '' }}>
                {{ $type->nom }}
            </option>
        @endforeach
    </select>
</div>


        <!-- Taux de garantie -->
        <div class="form-group">
            <label for="taux_garantie">Taux de garantie</label>
            <input type="number" step="0.01" class="form-control" id="taux_garantie" name="taux_garantie" value="{{ old('taux_garantie', $contrat->taux_garantie) }}" required>
        </div>

        <!-- Sélection du client -->
        <div class="form-group">
            <label for="client_id">Client</label>
            <select class="form-control" id="client_id" name="client_id" required>
                <option value="">Sélectionner un client</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id', $contrat->client_id) == $client->id ? 'selected' : '' }}>
                        {{ $client->nom_raison_sociale ?? '' }} {{ $client->prenoms ?? '' }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Montant -->
        <div class="form-group">
            <label for="montant">Montant</label>
            <input type="number" step="0.01" class="form-control" id="montant" name="montant" value="{{ old('montant', $contrat->montant) }}" required>
        </div>

        <!-- Statut -->
        <div class="form-group">
            <label for="statut">Statut</label>
            <select class="form-control" id="statut" name="statut" required>
                <option value="en cours" {{ old('statut', $contrat->statut) == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="terminé" {{ old('statut', $contrat->statut) == 'terminé' ? 'selected' : '' }}>Terminé</option>
                <option value="annulé" {{ old('statut', $contrat->statut) == 'annulé' ? 'selected' : '' }}>Annulé</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour le contrat</button>
    </form>
</div>
@endsection
