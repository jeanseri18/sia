@extends('layouts.app')

@section('content')
@include('sublayouts.until')
    <div class="container">
        <h1>Liste des Monnaies</h1>
        <a href="{{ route('monnaies.create') }}" class="btn btn-primary mb-3">Ajouter une monnaie</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Sigle</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($monnaies as $monnaie)
                    <tr>
                        <td>{{ $monnaie->nom }}</td>
                        <td>{{ $monnaie->sigle }}</td>
                        <td>
                            <a href="{{ route('monnaies.edit', $monnaie) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('monnaies.destroy', $monnaie) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer cette monnaie ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
