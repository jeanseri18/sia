@extends('layouts.app')

@section('content')
@include('sublayouts.until')

    <div class="container">
        <h1>Liste des Références</h1>
        <a href="{{ route('references.create') }}" class="btn btn-primary mb-3">Ajouter une référence</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Référence</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($references as $reference)
                    <tr>
                        <td>{{ $reference->nom }}</td>
                        <td>{{ $reference->ref }}</td>
                        <td>
                            <a href="{{ route('references.edit', $reference) }}" class="btn btn-warning">Modifier</a>
                            <form action="{{ route('references.destroy', $reference) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer cette référence ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
