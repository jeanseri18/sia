@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter une Facture</h2>
    <form action="{{ route('factures.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Numéro de Facture</label>
            <input type="text" name="num" class="form-control" required>
        </div>

        <!-- Sélection du type -->
        <div class="mb-3">
            <label class="form-label">Type de Sélection</label>
            <select id="type_select" name="type" class="form-control">
                <option value="">Sélectionner</option>
                <option value="artisan">Artisan</option>
                <option value="contrat">Contrat</option>
                <option value="prestation">Prestation</option>
            </select>
        </div>

        <!-- Sélection de Prestation -->
        <div id="prestation_select" class="mb-3" style="display: none;">
            <label class="form-label">Prestation (optionnel)</label>
            <select name="id_prestation" class="form-control">
                <option value="">Sélectionner</option>
                @foreach($prestations as $prestation)
                    <option value="{{ $prestation->id }}">{{ $prestation->artisan->nom }} - {{ $prestation->montant }}</option>
                @endforeach
            </select>
        </div>

        <!-- Sélection de Contrat -->
        <div id="contrat_select" class="mb-3" style="display: none;">
            <label class="form-label">Contrat (optionnel)</label>
            <select name="id_contrat" class="form-control">
                <option value="">Sélectionner</option>
                @foreach($contrats as $contrat)
                    <option value="{{ $contrat->id }}">{{ $contrat->nom_contrat }}</option>
                @endforeach
            </select>
        </div>

        <!-- Sélection d'Artisan -->
        <div id="artisan_select" class="mb-3" style="display: none;">
            <label class="form-label">Artisan</label>
            <select name="id_artisan" class="form-control">
                @foreach($artisans as $artisan)
                    <option value="{{ $artisan->id }}">{{ $artisan->nom }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Montant HT</label>
            <input type="number" name="montant_ht" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Montant Total</label>
            <input type="number" name="montant_total" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">CA Réalisé</label>
            <input type="number" name="ca_realise" class="form-control" value="0">
        </div>

        <div class="mb-3">
            <label class="form-label">Montant Réglé</label>
            <input type="number" name="montant_reglement" class="form-control" value="0">
        </div>

        <div class="mb-3">
            <label class="form-label">Date d'émission</label>
            <input type="date" name="date_emission" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Statut</label>
            <select name="statut" class="form-control" required>
                <option value="en attente">En attente</option>
                <option value="payée">Payée</option>
                <option value="annulée">Annulée</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
<script>
    document.getElementById('type_select').addEventListener('change', function() {
        const artisanSelect = document.getElementById('artisan_select');
        const contratSelect = document.getElementById('contrat_select');
        const prestationSelect = document.getElementById('prestation_select');

        // Réinitialiser la sélection des autres champs
        document.querySelector('[name="id_artisan"]').value = "";
        document.querySelector('[name="id_contrat"]').value = "";
        document.querySelector('[name="id_prestation"]').value = "";

        // Masquer tous les champs
        artisanSelect.style.display = 'none';
        contratSelect.style.display = 'none';
        prestationSelect.style.display = 'none';

        // Afficher uniquement le champ sélectionné
        const selectedType = this.value;
        if (selectedType === 'artisan') {
            artisanSelect.style.display = 'block';
        } else if (selectedType === 'contrat') {
            contratSelect.style.display = 'block';
        } else if (selectedType === 'prestation') {
            prestationSelect.style.display = 'block';
        }
    });
</script>
@endsection
