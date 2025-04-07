@extends('layouts.app')

@section('content')
@include('sublayouts.projetdetail')

<div class="card row ">
<div class=" row " style="padding: 20px;">


    <div class="col-md-4">
        {{-- Ref + Nom projet --}}
        <div class="">
          <h5 class="text-lg font-semibold text-gray-700 mb-2">Référence</h5>
            <p class="text-gray-900 mb-4">{{ $projet->ref_projet }}</p><br>
          <h5 class="text-lg font-semibold text-gray-700 mb-2"> Nom</h5>
            <p class="text-gray-900">{{ $projet->nom_projet }}</p><br>
        </div>
        </div>
        <div class="col-md-4">
        {{-- Client + Conducteur --}}
        <div class="">
          <h5 class="text-lg font-semibold text-gray-700 mb-2"> Client</h5>
            <p class="text-gray-900 mb-4">{{ $projet->client }}</p><br>
          <h5 class="text-lg font-semibold text-gray-700 mb-2">Conducteur</h5>
            <p class="text-gray-900">{{ $projet->conducteur_travaux }}</p><br>
        </div>
        </div>
        <div class="col-md-4">
        {{-- Dates --}}
        <div class="">
           
          <h5 class="text-lg font-semibold text-gray-700 mb-2"> Début</h5>
            <p class="text-gray-900 mb-2">{{ \Carbon\Carbon::parse($projet->date_debut)->format('d/m/Y') }}</p><br>
          <h5 class="text-lg font-semibold text-gray-700 mb-2"> Fin</h5>
            <p class="text-gray-900">{{ $projet->date_fin ? \Carbon\Carbon::parse($projet->date_fin)->format('d/m/Y') : 'Non défini' }}</p><br>
        </div>
        </div>
        <div class="col-md-4">
        {{-- Secteur + BU --}}
        <div class="">
          <h5 class="text-lg font-semibold text-gray-700 mb-2"> Secteur</h5>
            <p class="text-gray-900 mb-4">{{ $projet->secteurActivite->nom }}</p><br>
          <h5 class="text-lg font-semibold text-gray-700 mb-2"> BU</h5>
            <p class="text-gray-900">{{ $projet->bu->nom }}</p><br>
        </div>
        </div>
        <div class="col-md-4">
        {{-- TVA + Statut --}}
        <div class="">
            <h5 class="text-lg font-semibold text-gray-700 mb-2"> TVA</h5>
            <p class="text-gray-900 mb-4">{{ $projet->hastva ? 'Oui' : 'Non' }}</p><br>
            <h5 class="text-lg font-semibold text-gray-700 mb-2"> Statut</h5>
            <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold 
                @if($projet->statut == 'en cours') bg-yellow-100 text-yellow-800 
                @elseif($projet->statut == 'terminé') bg-green-100 text-green-800 
                @else bg-red-100 text-red-800 @endif">
                {{ucfirst($projet->statut)}}
            </span>
        </div>
        </div>
        <div class="col-md-4">
      <h5 class="text-lg font-semibold text-gray-700 mb-2">Création</h5>
        <p class="text-gray-900 mb-2">{{ \Carbon\Carbon::parse($projet->date_creation)->format('d/m/Y') }}</p><br>
        {{-- Description full width --}}
        @if($projet->description)
        <div class="sm:col-span-2 lg:col-span-3 ">
          <h5 class="text-lg font-semibold text-gray-700 mb-2"> Description</h5>
            <p class="text-gray-600 leading-relaxed">{{ $projet->description }}</p><br>
        </div>
        @endif
    </div>
    </div>
</div>
@endsection
