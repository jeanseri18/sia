@extends('layouts.app')

@section('content')
@include('sublayouts.bu')
<div class="container card" style="background:#F3F6F9 ;padding:20px;">
<h3 style="color:#033765">Modifier le BU : {{ $bu->nom }}</h3>
        <form action="{{ route('bu.update', $bu->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" value="{{ old('nom', $bu->nom) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Secteur d'activité</label>
                <select name="secteur_activite_id" class="form-control" required>
                    @foreach($secteurs as $secteur)
                        <option value="{{ $secteur->id }}" {{ $secteur->id == old('secteur_activite_id', $bu->secteur_activite_id) ? 'selected' : '' }}>
                            {{ $secteur->nom }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Adresse</label>
                <input type="text" name="adresse" value="{{ old('adresse', $bu->adresse) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Numéro RCCM</label>
                <input type="text" name="numero_rccm" value="{{ old('numero_rccm', $bu->numero_rccm) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Numéro CC</label>
                <input type="text" name="numero_cc" value="{{ old('numero_cc', $bu->numero_cc) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Statut</label>
                <select name="statut" class="form-control">
                    <option value="actif" {{ old('statut', $bu->statut) == 'actif' ? 'selected' : '' }}>Actif</option>
                    <option value="inactif" {{ old('statut', $bu->statut) == 'inactif' ? 'selected' : '' }}>Inactif</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Logo</label>
                <input type="file" name="logo" class="form-control">
                @if ($bu->logo)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $bu->logo) }}" alt="Logo actuel" class="img-fluid" style="max-width: 150px;">
                    </div>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
