@extends('layouts.auth')

@section('content')
<div class="container">
    <h2>Inscription</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="nom" placeholder="Nom" required>
        <input type="text" name="prenom" placeholder="Prénom" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="password" name="password_confirmation" placeholder="Confirmer le mot de passe" required>

        <label>Associer à des BU :</label>
        <select name="bus[]" multiple>
            @foreach($bus as $bu)
                <option value="{{ $bu->id }}">{{ $bu->nom }}</option>
            @endforeach
        </select>

        <button type="submit">S'inscrire</button>
    </form>
</div>
@endsection
