@extends('layouts.app')

@section('content')@include('sublayouts.projet')
<div class="container">
    <h3>Liste des projets</h3>
    <div class="card custom-card">
        <div class="card-body">
            <table id="Table" class="table table-bordered table-striped">
                <thead class="table-primary">
    
            <tr>
                <th>Référence</th>
                <th>Nom</th>
                <th>Client</th>
                <th>Date de création</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Secteur d'activité</th>
                <th>Conducteur de travaux</th>
                <th>TVA</th>
                <th>Statut</th>
                <th>Business Unit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($projets as $projet)
                <tr>
                    <td>{{ $projet->ref_projet }}</td>
                    <td>{{ $projet->nom_projet }}</td>
                    <td>{{ $projet->client }}</td>
                    <td>{{ $projet->date_creation }}</td>
                    <td>{{ $projet->date_debut }}</td>
                    <td>{{ $projet->date_fin ?? 'Non spécifiée' }}</td>
                    <td>{{ $projet->secteurActivite->nom ?? 'Secteur non défini' }}</td>
                    <td>{{ $projet->conducteur_travaux }}</td>
                    <td>{{ $projet->hastva ? 'Oui' : 'Non' }}</td>
                    <td>{{ $projet->statut }}</td>
                    <td>{{ $projet->bu->nom ?? 'Business Unit non défini' }}</td>
                    <td>
                        <a href="{{ route('projets.show', $projet) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('projets.edit', $projet) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('projets.destroy', $projet) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Supprimer ce projet ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table></div>
</div>
</div>
<style>
    .custom-card {
        border: 1px solid #033765; /* Bordure avec traits */
        border-radius: 8px; /* Coins arrondis */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Légère ombre */
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .custom-card:hover {
        transform: translateY(-5px); /* Animation au survol */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2); /* Ombre plus marquée */
    }

    .table-bordered th, .table-bordered td {
        border: 1px solid #ddd; /* Bordure en traits pour le tableau */
    }

    .btn-success {
        background-color: #033765;
        border-color: #033765;
    }

    .btn-success:hover {
        background-color: #033765;
        border-color: #033765;
    }
</style>
@endsection


@push('styles')
<link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-colvis-3.2.0/b-html5-3.2.0/b-print-3.2.0/r-3.0.3/datatables.min.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.1.8/b-3.2.0/b-colvis-3.2.0/b-html5-3.2.0/b-print-3.2.0/r-3.0.3/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#Table').DataTable({
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
            ],
            language: {
                url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/fr-FR.json"
            }
        });
    });
</script>
@endpush

