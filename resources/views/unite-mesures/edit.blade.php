@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'Unité de Mesure</h1>
    <a href="{{ route('unite-mesures.index') }}" class="btn btn-secondary mb-3">Retour</a>

    <form action="{{ route('unite-mesures.update', $unite->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nom de l'Unité</label>
            <input type="text" name="nom" class="form-control" value="{{ $unite->nom }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ref</label>
            <input type="text" name="ref" class="form-control" value="{{ $unite->ref }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
</div>
@endsection
