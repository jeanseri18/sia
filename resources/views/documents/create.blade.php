@extends('layouts.app')

@section('content')
@include('sublayouts.projetdetail')
<div class="card" style="background:#F3F6F9; padding:20px;">
<h3 style="color:#033765">Ajouter un Document</h2>

    {{-- Formulaire d'ajout --}}
    <div class=" shadow-md rounded-lg p-6">
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nom du document --}}
            <div class="mb-4">
                <label class="block text-gray-700">Nom</label>
                <input type="text" name="nom" class="form-control" required>
            </div>

        

            {{-- Fichier --}}
            <div class="mb-4">
                <label class="block text-gray-700">Fichier</label>
                <input type="file" name="fichier" class="form-control" required>
            </div>

            {{-- Bouton d'envoi --}}
            <button type="submit" class="btn btn-primary text-white px-4 py-2 rounded">Ajouter</button>
        </form>
    </div>
</div>
@endsection
