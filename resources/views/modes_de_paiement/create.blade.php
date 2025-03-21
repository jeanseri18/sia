@extends('layouts.app')

@section('content')
@include('sublayouts.until')

    <div class="container">
        <h1>Ajouter un Mode de Paiement</h1>
        <form action="{{ route('modes_de_paiement.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
@endsection
