@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier la Configuration</h2>
    
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    
    <form action="{{ route('config-global.update', $configGlobal->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Business Unit</label>
            <input type="text" class="form-control" value="{{ $configGlobal->businessUnit->name }}" disabled>
        </div>

        <div class="mb-3">
            <label class="form-label">Entête</label>
            <input type="text" class="form-control" name="entete" value="{{ $configGlobal->entete }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Numéro Départ Facture</label>
            <input type="text" class="form-control" name="numdepatfacture" value="{{ $configGlobal->numdepatfacture }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Pied de Page</label>
            <textarea class="form-control" name="pieddepage" required>{{ $configGlobal->pieddepage }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Logo</label>
            @if($configGlobal->logo)
                <div>
                    <img src="{{ asset('storage/' . $configGlobal->logo) }}" alt="Logo actuel" width="150">
                </div>
            @endif
            <input type="file" class="form-control" name="logo">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à Jour</button>
        <a href="{{ route('config-global.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
