@extends('layouts.app')

@section('content')
@include('sublayouts.until')
<div class="container card" style="background:#F3F6F9 ;padding:20px;">
<h3 style="color:#033765">Ajouter un Client</h3>
        @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
        <form action="{{ route('clients.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="categorie" class="form-label">Catégorie:</label>
                <select name="categorie" id="categorie" class="form-select" >
                    <option value="Particulier">Particulier</option>
                    <option value="Entreprise">Entreprise</option>
                </select>
            </div>



            <div id="particulier_fields" class="mb-3">
                <label for="nom" class="form-label">Nom:</label>
                <input type="text" name="nom_raison_sociale" class="form-control" >

                <label for="prenoms" class="form-label">Prénoms:</label>
                <input type="text" name="prenoms" class="form-control" >
            </div>

            <div id="entreprise_fields" class="mb-3" style="display:none;">
                <label for="raison_sociale" class="form-label">Raison Sociale:</label>
                <input type="text" name="raison_sociale" class="form-control">

                <label for="n_rccm" class="form-label">N° RCCM:</label>
                <input type="text" name="n_rccm" class="form-control">

                <label for="n_cc" class="form-label">N° CC:</label>
                <input type="text" name="n_cc" class="form-control">

                <label for="secteur_activite" class="form-label">Secteur d'Activité:</label>
                <select name="secteur_activite" class="form-select">
                    @foreach ($secteurs as $secteur)
                        <option value="{{ $secteur->nom }}">{{ $secteur->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="delai_paiement" class="form-label">Délai de paiement:</label>
                <select name="delai_paiement" class="form-select" >
                    <option value="30">30 jours</option>
                    <option value="60">60 jours</option>
                    <option value="90">90 jours</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="mode_paiement" class="form-label">Mode de paiement:</label>
                <select name="mode_paiement" class="form-select" >
                    <option value="Virement">Virement</option>
                    <option value="Chèque">Chèque</option>
                    <option value="Espèces">Espèces</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="regime_imposition" class="form-label">Régime d'imposition:</label>
                <select name="regime_imposition" class="form-select" >
                    <option value="Régime A">Régime A</option>
                    <option value="Régime B">Régime B</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="boite_postale" class="form-label">Boîte postale:</label>
                <input type="text" name="boite_postale" class="form-control" >
            </div>

            <div class="mb-3">
                <label for="adresse_localisation" class="form-label">Adresse:</label>
                <input type="text" name="adresse_localisation" class="form-control" >
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Téléphone:</label>
                <input type="text" name="telephone" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>

    <script>
        document.getElementById('categorie').addEventListener('change', function () {
            const particulierFields = document.getElementById('particulier_fields');
            const entrepriseFields = document.getElementById('entreprise_fields');
            if (this.value === 'Entreprise') {
                particulierFields.style.display = 'none';
                entrepriseFields.style.display = 'block';
            } else {
                particulierFields.style.display = 'block';
                entrepriseFields.style.display = 'none';
            }
        });
    </script>
@endsection
