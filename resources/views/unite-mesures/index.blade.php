@extends('layouts.app')

@section('content')

@include('sublayouts.until')
<div class="container">
    <h1 class="mb-4">Liste des Unités de Mesure</h1>
    <a href="{{ route('unite-mesures.create') }}" class="btn btn-primary mb-3">Ajouter une Unité de Mesure</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Ref</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($unites as $unite)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $unite->nom }}</td>
                <td>{{ $unite->ref }}</td>
                <td>
                    <a href="{{ route('unite-mesures.edit', $unite->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('unite-mesures.destroy', $unite->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer cette unité ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
