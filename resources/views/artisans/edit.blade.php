@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier l'Artisan</h2>
    <form action="{{ route('artisans.update', $artisan->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" value="{{ $artisan->nom }}" required>
        </div>
        
        <div class="mb-3">
            <label>Corps de Métier</label>
            <select name="id_corpmetier" class="form-control" required>
                @foreach($corpsMetiers as $corp)
                    <option value="{{ $corp->id }}" {{ $artisan->id_corpmetier == $corp->id ? 'selected' : '' }}>
                        {{ $corp->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label>Type</label>
            <select name="type" class="form-control" required>
                <option value="artisan" {{ $artisan->type == 'artisan' ? 'selected' : '' }}>Artisan</option>
                <option value="travailleur" {{ $artisan->type == 'travailleur' ? 'selected' : '' }}>Travailleur</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('artisans.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
