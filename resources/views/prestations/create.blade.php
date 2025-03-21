@extends('layouts.app')

@section('content')
@if ($errors->any())
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
<div class="container">
    <h2>Ajouter une Prestation</h2>
    <form action="{{ route('prestations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Artisan</label>
            <select name="id_artisan" class="form-control">
                @foreach($artisans as $artisan)
                    <option value="{{ $artisan->id }}">{{ $artisan->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Contrat</label>
            <select name="id_contrat" class="form-control">
                @foreach($contrats as $contrat)
                    <option value="{{ $contrat->id }}">{{ $contrat->nom_contrat }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Prestation</label>
            <input type="string" name="prestation_titre" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Detail</label>
            <input type="string" name="detail" class="form-control" required>
        </div>
  
        <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>
</div>
@endsection
