@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Type de Travaux</h1>
    <a href="{{ route('type-travaux.index') }}" class="btn btn-secondary mb-3">Retour</a>

    <form action="{{ route('type-travaux.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nom du Type de Travaux</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection
