@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter une Configuration</h2>
    <form action="{{ route('config-global.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>En-tête:</label>
        <input type="text" name="entete" class="form-control" required>
        
        <label>Numéro de départ:</label>
        <input type="text" name="numdepatfacture" class="form-control" required>

        <label>Pied de page:</label>
        <textarea name="pieddepage" class="form-control" required></textarea>

        <label>Logo:</label>
        <input type="file" name="logo" class="form-control">

        <label>Business Unit:</label>
        <select name="id_bu" class="form-control" required>
            @foreach($businessUnits as $bu)
                <option value="{{ $bu->id }}">{{ $bu->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-success mt-2">Ajouter</button>
    </form>
</div>
@endsection
