@extends('layouts.app')

@section('content')
@include('sublayouts.until')

    <div class="container">
        <h1>Modifier le Mode de Paiement</h1>
        <form action="{{ route('modes_de_paiement.update', $modeDePaiement) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ $modeDePaiement->nom }}" required>
            </div>
            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
    </div>
@endsection
