@extends('layouts.app')

@section('content')
@include('sublayouts.until')
<div class="container card" style="background:#F3F6F9 ;padding:20px;">
<h3 style="color:#033765">Modifier le Secteur : {{ $secteur->nom }}</h3>
        <form action="{{ route('secteur_activites.update', $secteur->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nom</label>
                <input type="text" name="nom" value="{{ old('nom', $secteur->nom) }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
    </div>
@endsection
