@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un Artisan</h2>
    <form action="{{ route('artisans.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Corps de Métier</label>
            <select name="id_corpmetier" class="form-control" required>
                @foreach($corpsMetiers as $corp)
                    <option value="{{ $corp->id }}">{{ $corp->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control" required>
                <option value="artisan">Artisan</option>
                <option value="travailleur">Travailleur</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
