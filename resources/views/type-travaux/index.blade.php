@extends('layouts.app')

@section('content')

@include('sublayouts.until')
<div class="container">
    <h1 class="mb-4">Liste des Types de Travaux</h1>
    <a href="{{ route('type-travaux.create') }}" class="btn btn-primary mb-3">Ajouter un Type de Travaux</a>

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
            @foreach($types as $type)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $type->nom }}</td>
                <td>
                    <a href="{{ route('type-travaux.edit', $type->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('type-travaux.destroy', $type->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer ce type de travaux ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
