
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Pays</h1>
    <a href="{{ route('pays.index') }}" class="btn btn-secondary mb-3">Retour</a>

    <form action="{{ route('pays.update', $pays->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nom du Pays</label>
            <input type="text" name="nom" class="form-control" value="{{ $pays->nom }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
</div>
@endsection

