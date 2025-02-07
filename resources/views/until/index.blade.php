@extends('layouts.app')

@section('content')

@include('sublayouts.until')

<div class="container mt-4">
    <div class="row g-3"> {{-- Ajout d'un espacement entre les cartes --}}
        
    @php
            $links = [
                ['route' => 'projets.index', 'icon' => 'bi-folder', 'text' => 'Projet'],
                ['route' => 'secteur_activites.index', 'icon' => 'bi-building', 'text' => 'Secteur d\'activité'],
                ['route' => 'categories.index', 'icon' => 'bi-tag', 'text' => 'Catégorie'],
                ['route' => 'sous_categories.index', 'icon' => 'bi-list-ul', 'text' => 'Sous-catégorie'],
                ['route' => 'articles.index', 'icon' => 'bi-newspaper', 'text' => 'Article'],
                ['route' => 'bu.create', 'icon' => 'bi-bank', 'text' => 'Bu'],
                ['route' => 'until', 'icon' => 'bi-file-earmark-text', 'text' => 'Contrat'],
                ['route' => 'clients.index', 'icon' => 'bi-person', 'text' => 'Client'],
                ['route' => 'fournisseurs.index', 'icon' => 'bi-truck', 'text' => 'Fournisseur'],
                ['route' => 'artisans.index', 'icon' => 'bi-person', 'text' => 'Artisan'],
                ['route' => 'corpsmetiers.index', 'icon' => 'bi-person', 'text' => 'Corps Metier'],

            ];
        @endphp

        @foreach ($links as $link)
            <div class="col-md-3">
                <div class="card shadow-sm text-center" style="height: 200px;">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="fas {{ $link['icon'] }} fa-3x text-primary mb-3" style="font-size:70px;"></i>
                        <a href="{{ route($link['route']) }}" class="stretched-link text-decoration-none">
                            <strong>{{ $link['text'] }}</strong>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>

@endsection
