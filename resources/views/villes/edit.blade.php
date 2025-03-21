@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier la Ville</h1>
    <a href="{{ route('villes.index') }}" class="btn btn-secondary mb-3">Retour</a>

    <form action="{{ route('villes.update', $ville->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nom de la Ville</label>
            <input type="text" name="nom" class="form-control" value="{{ $ville->nom }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Pays</label>
            <select name="id_pays" class="form-control" required>
                @foreach($pays as $p)
                    <option value="{{ $p->id }}" {{ $p->id == $ville->id_pays ? 'selected' : '' }}>{{ $p->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
    </form>
</div>
@endsection
