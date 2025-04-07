@extends('layouts.app')

@section('content')
@include('sublayouts.projetdetail')
@if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <div class="container">
        <h2>Créer un nouveau contrat</h2>
        <form action="{{ route('contrats.store') }}" method="POST">
            @csrf
       
            <div class="form-group">
                <label for="nom_contrat">Nom du contrat</label>
                <input type="text" class="form-control" id="nom_contrat" name="nom_contrat" required>
            </div>
            <div class="form-group">
                <label for="date_debut">Date de début</label>
                <input type="date" class="form-control" id="date_debut" name="date_debut" required>
            </div>
            <div class="form-group">
                <label for="date_fin">Date de fin</label>
                <input type="date" class="form-control" id="date_fin" name="date_fin">
            </div>
            <div class="form-group">
                <label for="type_travaux">Type de travaux</label>
                    <select name="type_travaux" id="type_travaux" class="form-select" required>
                        <option value="">Sélectionner un type Travaux</option>
                        @foreach ($typeTravaux as $type)
                            <option value="{{ $type->nom }}">{{ $type->nom }}</option>
                        @endforeach
                    </select>            </div>
            <div class="form-group">
                <label for="taux_garantie">Taux de garantie</label>
                <input type="number" step="0.01" class="form-control" id="taux_garantie" name="taux_garantie" required>
            </div>
                   <!-- Sélection du client -->
                   <div class="form-group">
                    <label for="client_id" class="form-label">Client :</label>
                    <select name="client_id" id="client_id" class="form-select" required>
                        <option value="">Sélectionner un client</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->nom_raison_sociale && $client->prenoms ? $client->nom_raison_sociale . ' ' . $client->prenoms : ($client->nom_raison_sociale ?? $client->prenoms) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            <div class="form-group">
                <label for="montant">Montant</label>
                <input type="number" step="0.01" class="form-control" id="montant" name="montant" required>
            </div>
            <div class="form-group">
                <label for="statut">Statut</label>
                <select class="form-control" id="statut" name="statut" required>
                    <option value="en cours">En cours</option>
                    <option value="terminé">Terminé</option>
                    <option value="annulé">Annulé</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Créer le contrat</button>
        </form>
    </div>
@endsection
