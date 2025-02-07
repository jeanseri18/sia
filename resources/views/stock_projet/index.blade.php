@extends('layouts.app')

@section('content')
@section('content')
@include('sublayouts.projetdetail')
<br>
    <div class="container">
        <h3>Liste des stocks pour le projet</h3>

        <a href="{{ route('stock.create') }}" class="btn btn-primary mb-3">Ajouter un produit au stock</a>

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
                    <th>Nom du produit</th>
                    <th>Quantité</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stocks as $stock)
                    <tr>
                        <td>{{ $stock->nom_produit }}</td>
                        <td>{{ $stock->quantite }}</td>
                        <td>
                            <a href="{{ route('stock.edit', $stock->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('stock.destroy', $stock->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">Supprimer</button>
                            </form>
                                <!-- Bouton pour ouvrir le modal -->
<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#transfertModal">
    Effectuer un transfert
</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


<!-- Modal -->
<div class="modal fade" id="transfertModal" tabindex="-1" aria-labelledby="transfertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transfertModalLabel">Transférer du stock</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('transferts.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Projet Source</label>
                        <select name="id_projet_source" class="form-control" required>
                            @foreach($projets as $projet)
                                <option value="{{ $projet->id }}">{{ $projet->nom_projet }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label>Projet Destination</label>
                        <select name="id_projet_destination" class="form-control" required>
                            @foreach($projets as $projet)
                                <option value="{{ $projet->id }}">{{ $projet->nom_projet }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
    <label>Article</label>
    <select name="article_id" class="form-control" required>
        @foreach($articles as $article)
            <option value="{{ $article->id }}">{{ $article->nom }}</option>
        @endforeach
    </select>
</div>


                    <div class="mb-3">
                        <label>Quantité</label>
                        <input type="number" name="quantite" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Date de transfert</label>
                        <input type="date" name="date_transfert" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Transférer</button>
                </form>
            </div>
        </div>
    </div>
</div>
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


@endsection
