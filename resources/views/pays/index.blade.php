
@extends('layouts.app')

@section('content')

@include('sublayouts.until')
<div class="container">
    <h1 class="mb-4">Liste des Pays</h1>
    <a href="{{ route('pays.create') }}" class="btn btn-primary mb-3">Ajouter un Pays</a>

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
            @foreach($pays as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nom }}</td>
                <td>
                    <a href="{{ route('pays.edit', $p->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                    <form action="{{ route('pays.destroy', $p->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous supprimer ce pays ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
