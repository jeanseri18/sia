@extends('layouts.app')

@section('content')
@include('sublayouts.until')
<div class="container">
    <h3>Liste des Fournisseurs</h3>
    <a href="{{ route('fournisseurs.create') }}" class="btn btn-primary mb-3">Ajouter un fournisseur</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card custom-card">
        <div class="card-body">
            <table id="Table" class="table table-bordered table-striped">
                <thead class="table-primary">
    
            <tr>
                <th>Nom</th>
                <th>Prénoms</th>
                <th>Délai de paiement</th>
                <th>Mode de paiement</th>
                <th>Régime d'imposition</th>
                <th>Boîte postale</th>
                <th>Adresse</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Type</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fournisseurs as $fournisseur)
                <tr>
                    <td>{{ $fournisseur->nom_raison_sociale }}</td>
                    <td>{{ $fournisseur->prenoms }}</td>
                    <td>{{ $fournisseur->delai_paiement }}</td>
                    <td>{{ $fournisseur->mode_paiement }}</td>
                    <td>{{ $fournisseur->regime_imposition }}</td>
                    <td>{{ $fournisseur->boite_postale }}</td>
                    <td>{{ $fournisseur->adresse_localisation }}</td>
                    <td>{{ $fournisseur->email }}</td>
                    <td>{{ $fournisseur->telephone }}</td>
                    <td>{{ $fournisseur->type }}</td>
                    <td>
                        <a href="{{ route('fournisseurs.edit', $fournisseur) }}" class="btn btn-warning btn-sm">Modifier</a>

                        <form action="{{ route('fournisseurs.destroy', $fournisseur) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce fournisseur ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> </div>
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

