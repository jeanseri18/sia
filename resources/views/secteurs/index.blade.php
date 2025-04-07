@extends('layouts.app')

@section('content')

@include('sublayouts.until')
<div class="row">
<div class="col-md-8">
    <h2>Liste des secteurs</h2>
</div>
<div class="col-md-4">
    <a href="{{ route('secteurs.create') }}" class="btn btn-primary">+ Ajouter</a>
    </div></div>
    <br>
 

    <table id="Table" class="table table-bordered">        <thead>
            <tr>
                <th>Nom du secteur</th>
                <th>Ville</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($secteurs as $secteur)
                <tr>
                    <td>{{ $secteur->nom }}</td>
                    <td>{{ $secteur->ville->nom }}</td>
                    <td>
                        <a href="{{ route('secteurs.edit', $secteur->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                        <form action="{{ route('secteurs.destroy', $secteur->id) }}"  method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Confirmer la suppression ?')" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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

