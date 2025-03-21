@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des Modes de Paiement</h1>
        <a href="{{ route('modes_de_paiement.create') }}" class="btn btn-primary mb-3">Ajouter un mode de paiement</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($modesDePaiement as $modeDePaiement)
                    <tr>
                        <td>{{ $modeDePaiement->nom }}</td>
                        <td>
                            <a href="{{ route('modes_de_paiement.edit', $modeDePaiement) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('modes_de_paiement.destroy', $modeDePaiement) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer ce mode de paiement ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
