@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Ajouter un Corps de Métier</h3>
    @if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form action="{{ route('corpsmetiers.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nom</label>
            <input type="text" name="nom" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
        <a href="{{ route('corpsmetiers.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
