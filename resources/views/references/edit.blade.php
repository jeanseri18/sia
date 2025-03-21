@extends('layouts.app')

@section('content')
@include('sublayouts.until')

    <div class="container">
        <h1>Modifier la Référence</h1>
        <form action="{{ route('references.update', $reference) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" name="nom" class="form-control" value="{{ $reference->nom }}" required>
            </div>
            <div class="mb-3">
                <label for="ref" class="form-label">Référence</label>
                <input type="text" name="ref" class="form-control" value="{{ $reference->ref }}" required>
            </div>
            <button type="submit" class="btn btn-success">Mettre à jour</button>
        </form>
    </div>
@endsection
