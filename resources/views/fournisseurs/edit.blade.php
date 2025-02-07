@extends('layouts.app')

@section('content')
@include('sublayouts.until')
<div class="container card" style="background:#F3F6F9 ;padding:20px;">
<h3 style="color:#033765">Modifier Client</h3>

    <form action="{{ route('fournisseurs.update', $fournisseur->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="categorie">Catégorie:</label>
            <select name="categorie" id="categorie" class="form-control" required>
                <option value="Particulier" {{ $client->categorie == 'Particulier' ? 'selected' : '' }}>Particulier</option>
                <option value="Entreprise" {{ $client->categorie == 'Entreprise' ? 'selected' : '' }}>Entreprise</option>
            </select>
        </div>


        <div id="particulier_fields" @if($client->categorie == 'Particulier') style="display:block;" @else style="display:none;" @endif>
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" name="nom_raison_sociale" value="{{ old('nom_raison_sociale', $client->nom_raison_sociale) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="prenoms">Prénoms:</label>
                <input type="text" name="prenoms" value="{{ old('prenoms', $client->prenoms) }}" class="form-control" required>
            </div>
        </div>

        <div id="entreprise_fields" @if($client->categorie == 'Entreprise') style="display:block;" @else style="display:none;" @endif>
            <div class="form-group">
                <label for="raison_sociale">Raison Sociale:</label>
                <input type="text" name="raison_sociale" value="{{ old('raison_sociale', $client->raison_sociale) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="n_rccm">N° RCCM:</label>
                <input type="text" name="n_rccm" value="{{ old('n_rccm', $client->n_rccm) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="n_cc">N° CC:</label>
                <input type="text" name="n_cc" value="{{ old('n_cc', $client->n_cc) }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="secteur_activite">Secteur d'Activité:</label>
                <select name="secteur_activite" class="form-control">
                    @foreach ($secteurs as $secteur)
                        <option value="{{ $secteur->nom }}" {{ $client->secteur_activite == $secteur->nom ? 'selected' : '' }}>{{ $secteur->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="delai_paiement">Délai de paiement:</label>
            <select name="delai_paiement" class="form-control" required>
                <option value="30" {{ $client->delai_paiement == 30 ? 'selected' : '' }}>30 jours</option>
                <option value="60" {{ $client->delai_paiement == 60 ? 'selected' : '' }}>60 jours</option>
                <option value="90" {{ $client->delai_paiement == 90 ? 'selected' : '' }}>90 jours</option>
            </select>
        </div>

        <div class="form-group">
            <label for="mode_paiement">Mode de paiement:</label>
            <select name="mode_paiement" class="form-control" required>
                <option value="Virement" {{ $client->mode_paiement == 'Virement' ? 'selected' : '' }}>Virement</option>
                <option value="Chèque" {{ $client->mode_paiement == 'Chèque' ? 'selected' : '' }}>Chèque</option>
                <option value="Espèces" {{ $client->mode_paiement == 'Espèces' ? 'selected' : '' }}>Espèces</option>
            </select>
        </div>

        <div class="form-group">
            <label for="regime_imposition">Régime d'imposition:</label>
            <select name="regime_imposition" class="form-control" required>
                <option value="Régime A" {{ $client->regime_imposition == 'Régime A' ? 'selected' : '' }}>Régime A</option>
                <option value="Régime B" {{ $client->regime_imposition == 'Régime B' ? 'selected' : '' }}>Régime B</option>
            </select>
        </div>

        <div class="form-group">
            <label for="boite_postale">Boîte postale:</label>
            <input type="text" name="boite_postale" value="{{ old('boite_postale', $client->boite_postale) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="adresse_localisation">Adresse:</label>
            <input type="text" name="adresse_localisation" value="{{ old('adresse_localisation', $client->adresse_localisation) }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email', $client->email) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="telephone">Téléphone:</label>
            <input type="text" name="telephone" value="{{ old('telephone', $client->telephone) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
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
