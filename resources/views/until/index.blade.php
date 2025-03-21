@extends('layouts.app')

@section('content')

@include('sublayouts.until')

<div class="container mt-4">
    <div class="row g-3"> {{-- Ajout d'un espacement entre les cartes --}}
        
    @php
$links = [
    ['route' => 'projets.index', 'icon' => 'bi-folder2-open', 'text' => 'Projet'],
    ['route' => 'secteur_activites.index', 'icon' => 'bi-buildings-fill', 'text' => 'Secteur d\'activité'],
    ['route' => 'categories.index', 'icon' => 'bi-tag-fill', 'text' => 'Catégorie'],
    ['route' => 'sous_categories.index', 'icon' => 'bi-list-ul', 'text' => 'Sous-catégorie'],
    ['route' => 'articles.index', 'icon' => 'bi-file-earmark-text-fill', 'text' => 'Article'],
    ['route' => 'bu.create', 'icon' => 'bi-house-door-fill', 'text' => 'Bu'],
    ['route' => 'until', 'icon' => 'bi-file-earmark-text', 'text' => 'Contrat'],
    ['route' => 'clients.index', 'icon' => 'bi-people-fill', 'text' => 'Client'],
    ['route' => 'fournisseurs.index', 'icon' => 'bi-truck', 'text' => 'Fournisseur'],
    ['route' => 'artisans.index', 'icon' => 'bi-person-badge-fill', 'text' => 'Artisan'],
    ['route' => 'corpsmetiers.index', 'icon' => 'bi-tools', 'text' => 'Corps Metier'],
    ['route' => 'pays.index', 'icon' => 'bi-globe2', 'text' => 'Pays'],
    ['route' => 'villes.index', 'icon' => 'bi-geo-alt-fill', 'text' => 'Ville'],
    ['route' => 'secteurs.index', 'icon' => 'bi-diagram-3-fill', 'text' => 'Secteur'],
    ['route' => 'type-travaux.index', 'icon' => 'bi-hammer', 'text' => 'Type de travaux'],
    ['route' => 'unite-mesures.index', 'icon' => 'bi-rulers', 'text' => 'Unité de mesure'],
    ['route' => 'regime-impositions.index', 'icon' => 'bi-cash-stack', 'text' => 'Régime d\'imposition'],
    ['route' => 'banques.index', 'icon' => 'bi-bank', 'text' => 'Banques'],
    ['route' => 'references.index', 'icon' => 'bi-bookmark-check-fill', 'text' => 'Références'],
    ['route' => 'monnaies.index', 'icon' => 'bi-currency-exchange', 'text' => 'Monnaie'],
    ['route' => 'modes_de_paiement.index', 'icon' => 'bi-credit-card-2-front-fill', 'text' => 'Mode de paiement'],
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
