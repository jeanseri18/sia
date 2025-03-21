@extends('layouts.app')

@section('content')

@include('sublayouts.until')
<div class="container">
    <h1 class="mb-4">Liste des Régimes d'Imposition</h1>
    <a href="{{ route('regime-impositions.create') }}" class="btn btn-primary mb-3">Ajouter un Régime d'Imposition</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($regimes as $regime)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $regime->nom }}</td>
                <td>
                    <a href="{{ route('regime-impositions.edit', $regime->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('regime-impositions.destroy', $regime->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer ce régime ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
