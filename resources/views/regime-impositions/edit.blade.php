@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Régime d'Imposition</h1>
    <a href="{{ route('regime-impositions.index') }}" class="btn btn-secondary mb-3">Retour</a>

    <form action="{{ route('regime-impositions.update', $regime->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nom du Régime</label>
            <input type="text" name="nom" class="form-control" value="{{ $regime->nom }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">ref</label>
            <input type="text" name="ref" class="form-control" value="{{ $regime->ref }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tva</label>
            <input type="text" name="tva" class="form-control" value="{{ $regime->tva }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
</div>
@endsection
