@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-4">
            <div class="card shadow-lg">
                <div class="card-body">
    <h2>Choisissez une BU</h2>
    <form method="POST" action="{{ route('select.bu.post') }}">
        @csrf
        <select name="bu_id" required>
            @foreach($bus as $bu)
                <option value="{{ $bu->id }}">{{ $bu->nom }}</option>
            @endforeach
        </select>
        <button type="submit">Valider</button>
    </form>
</div>
</div>
</div>
</div>
@endsection
