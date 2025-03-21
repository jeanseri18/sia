@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Type de Travaux</h1>
    <a href="{{ route('type-travaux.index') }}" class="btn btn-secondary mb-3">Retour</a>

    <form action="{{ route('type-travaux.update', $type->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nom du Type de Travaux</label>
            <input type="text" name="nom" class="form-control" value="{{ $type->nom }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
</div>
@endsection
