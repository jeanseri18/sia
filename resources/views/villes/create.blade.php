@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une Ville</h1>
    <a href="{{ route('villes.index') }}" class="btn btn-secondary mb-3">Retour</a>

    {{-- Affichage des erreurs --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('villes.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nom de la Ville</label>
            <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" required>
            @error('nom')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Coefficient eloignement</label>
            <input type="text" name="coef_eloignement" class="form-control @error('coef_eloignement') is-invalid @enderror" value="{{ old('coef_eloignement') }}" required>
            @error('coef_eloignement')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        

        <div class="mb-3">
            <label class="form-label">Pays</label>
            <select name="pays_id" class="form-control @error('pays_id') is-invalid @enderror" required>
                <option value="">Sélectionner un Pays</option>
                @foreach($pays as $p)
                    <option value="{{ $p->id }}" {{ old('pays_id') == $p->id ? 'selected' : '' }}>
                        {{ $p->nom }}
                    </option>
                @endforeach
            </select>
            @error('pays_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection
