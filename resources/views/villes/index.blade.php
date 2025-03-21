@extends('layouts.app')

@section('content')

@include('sublayouts.until')
<div class="container">
    <h1 class="mb-4">Liste des Villes</h1>
    <a href="{{ route('villes.create') }}" class="btn btn-primary mb-3">Ajouter une Ville</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Pays</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($villes as $ville)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ville->nom }}</td>
                <td>{{ $ville->pays->nom }}</td>
                <td>
                    <a href="{{ route('villes.edit', $ville->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('villes.destroy', $ville->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer cette ville ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
