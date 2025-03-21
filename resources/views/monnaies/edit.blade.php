@extends('layouts.app')

@section('content')
@include('sublayouts.until')
@include('sublayouts.until')

    <div class="container">
        <h1>Modifier la Monnaie</h1>
        <form action="{{ route('monnaies.update', $monnaie) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ $monnaie->nom }}" required>
            </div>
            <div class="mb-3">
                <label for="sigle" class="form-label">Sigle</label>
                <input type="text" name="sigle" class="form-control" value="{{ $monnaie->sigle }}" required>
            </div>
            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
    </div>
@endsection
