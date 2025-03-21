@extends('layouts.app')

@section('content')
@include('sublayouts.contrat')
<div class="container">
    <h2>Liste des Factures</h2>
    
    <!-- Bouton pour créer une nouvelle facture -->
    <a href="{{ route('factures.create') }}" class="btn btn-primary mb-3">Ajouter une nouvelle facture</a>
    
    <div class="card custom-card">
    <div class="card-body">  
    <table id="Table" class="table table-bordered table-striped">
    <thead>
            <tr>
                <th>#</th>
                <th>Numéro de Facture</th>
                <th>Prestation</th>
                <th>Contrat</th>
                <th>Artisan</th>
                <th>Montant HT</th>
                <th>Montant Total</th>
                <th>Montant Réglé</th>
                <th>Reste à Régler</th>
                <th>Statut</th>
                <th>Date d'Émission</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($factures as $facture)
                <tr>
                    <td>{{ $facture->id }}</td>
                    <td>{{ $facture->num }}</td>
                    
                    <!-- Afficher les informations de prestation, contrat et artisan -->
                    <td>{{ $facture->prestation ? $facture->prestation->artisan->nom . ' - ' . $facture->prestation->montant : 'N/A' }}</td>
                    <td>{{ $facture->contrat ? $facture->contrat->nom_contrat : 'N/A' }}</td>
                    <td>{{ $facture->artisan ? $facture->artisan->nom : 'N/A' }}</td>
                    
                    <td>{{ number_format($facture->montant_ht, 2) }} CFA</td>
                    <td>{{ number_format($facture->montant_total, 2) }} CFA</td>
                    <td>{{ number_format($facture->montant_reglement, 2) }} CFA</td>
                    <td>{{ number_format($facture->reste_a_regler, 2) }} CFA</td>
                    
                    <td>{{ ucfirst($facture->statut) }}</td>
                    <td>{{ \Carbon\Carbon::parse($facture->date_emission)->format('d/m/Y') }}</td>
                    
                    <td>
                        <!-- Bouton pour supprimer une facture -->
                        <form action="{{ route('factures.destroy', $facture->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette facture ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
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


@endsection

