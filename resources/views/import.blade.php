@extends('layouts.app')

@section('content')
@include('sublayouts.until')

<form action="{{ route('import.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <H3 for="file">Choisir un fichier Excel</H3><br>

    <div class="form-group">
        <input type="file" name="file" class="form-control" required>
    </div><br>
    <button type="submit" class="btn btn-primary">Importer</button>
</form>
@endsection