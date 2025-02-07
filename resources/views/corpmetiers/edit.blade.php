@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier un Corps de Métier</h2>
    <form action="{{ route('corpsmetiers.update', $corpsMetier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $corpsMetier->nom }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('corpsmetiers.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
