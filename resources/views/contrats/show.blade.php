@extends('layouts.app')

@section('content')

@include('sublayouts.contrat')
    <div class="container">
        <h2>Détails du contrat : {{ $contrat->nom_contrat }}</h2>

        <div class="card">
            <div class="card-header">
                Référence : {{ $contrat->ref_contrat }}
            </div>
            <div class="card-body">
                <p><strong>Nom du contrat :</strong> {{ $contrat->nom_contrat }}</p>
                <p><strong>Date de début :</strong> {{ $contrat->date_debut }}</p>
                <p><strong>Date de fin :</strong> {{ $contrat->date_fin ?? 'Non spécifiée' }}</p>
                <p><strong>Type de travaux :</strong> {{ $contrat->type_travaux }}</p>
                <p><strong>Taux de garantie :</strong> {{ $contrat->taux_garantie }}%</p>
                <p><strong>Client :</strong> {{ $contrat->client->name }}</p>
                <p><strong>Montant :</strong> {{ number_format($contrat->montant, 2) }} FCFA</p>
                <p><strong>Statut :</strong> {{ $contrat->statut }}</p>
            </div>
        </div>
    </div>
@endsection
