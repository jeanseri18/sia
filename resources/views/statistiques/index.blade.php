@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tableau de bord - Statistiques</h3>

    <div class="row">
        <div class="col-md-3">
            <div class="card  text-white text-left p-3" style="background:#033765">
                <h6>Projets en cours</h6>
                <h2>{{ $projetsEnCours }}</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white text-left p-3" style="background:#033765">
                <h6>Revenus Totaux</h6>
                <h2>{{ number_format($revenusTotaux, 2, ',', ' ') }} CFA</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card  text-white text-left p-3" style="background:#033765">
                <h6>Dépenses Totales</h6>
                <h2>{{ number_format($depensesTotales, 2, ',', ' ') }} CFA</h2>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card  text-white text-left p-3" style="background:#033765">
                <h6>Articles en stock</h6>
                <h2>{{ $articlesEnStock }}</h2>
            </div>
        </div>
    </div>
    <div style="height:450px;">
    <h3 class="mt-5">Évolution des Entrées et Sorties</h3>
    <canvas id="evolutionChart"></canvas>
</div>
</div>
<!-- Graphique avec Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('evolutionChart').getContext('2d');

        const labels = {!! json_encode($evolutionFinanciere->pluck('mois')) !!};
        const entrees = {!! json_encode($evolutionFinanciere->pluck('total_entrees')) !!};
        const sorties = {!! json_encode($evolutionFinanciere->pluck('total_sorties')) !!};

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Entrées (CFA)',
                        data: entrees,
                        borderColor: 'green',
                        backgroundColor: 'rgba(0, 255, 0, 0.1)',
                        fill: true
                    },
                    {
                        label: 'Sorties (CFA)',
                        data: sorties,
                        borderColor: 'red',
                        backgroundColor: 'rgba(255, 0, 0, 0.1)',
                        fill: true
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    });
</script>
@endsection
