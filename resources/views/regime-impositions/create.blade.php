@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Régime d'Imposition</h1>
    <a href="{{ route('regime-impositions.index') }}" class="btn btn-secondary mb-3">Retour</a>

    <form action="{{ route('regime-impositions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nom du Régime</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Ref</label>
            <input type="text" name="ref" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tva</label>
            <input type="text" name="tva" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection
