@extends('layouts.app')

@section('content')
@include('sublayouts.bu')
    <div class="container card" style="background:#F3F6F9 ;padding:20px;">
        <h3 style="color:#033765">Créer un BU</h3>
        <form action="{{ route('bu.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Secteur d'activité</label>
                <select name="secteur_activite_id" class="form-control" required>
                    @foreach($secteurs as $secteur)
                        <option value="{{ $secteur->id }}">{{ $secteur->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Adresse</label>
                <input type="text" name="adresse" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Numéro RCCM</label>
                <input type="text" name="numero_rccm" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Numéro CC</label>
                <input type="text" name="numero_cc" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Solde initial</label>
                <input type="text" name="soldecaisse" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Statut</label>
                <select name="statut" class="form-control">
                    <option value="actif">Actif</option>
                    <option value="inactif">Inactif</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Créer</button>
        </form>
    </div>
@endsection
