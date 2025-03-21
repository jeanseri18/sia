@extends('layouts.app')

@section('content')
@include('sublayouts.until')
@include('sublayouts.until')

    <div class="container">
        <h1>Ajouter une Monnaie</h1>
        <form action="{{ route('monnaies.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="sigle" class="form-label">Sigle</label>
                <input type="text" name="sigle" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Ajouter</button>
        </form>
    </div>
@endsection
