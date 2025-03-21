@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Détails du Document</h2>

    <div class="bg-white shadow-md rounded-lg p-6">
        <p><strong>Nom :</strong> {{ $document->nom }}</p>

        {{-- Lien pour télécharger le fichier --}}
        <p><strong>Fichier :</strong> 
            <a href="{{ asset('storage/' . $document->chemin) }}" class="text-blue-500 underline" target="_blank">
                Voir le document
            </a>
        </p>

        {{-- Bouton Retour --}}
        <a href="{{ route('documents.index') }}" class="mt-4 inline-block bg-gray-500 text-white px-4 py-2 rounded">Retour</a>
    </div>
</div>
@endsection
