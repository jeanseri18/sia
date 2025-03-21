@extends('layouts.app')

@section('content')
@include('sublayouts.contrat')

<div class="container mx-auto p-6">
    <h2 class="text-2xl font-bold mb-4">Liste des Documents</h2>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif



    {{-- Tableau des documents --}}
    <div class="bg-white shadow-md rounded-lg ">
    <table id="Table" class="table table-bordered table-striped">
    <thead>
                <tr class="bg-gray-200">
                    <th class="p-3">Nom</th>
                    <th class="p-3">Fichier</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                <tr class="border-b">
                    <td class="p-3">{{ $document->nom }}</td>
                    <td class="p-3">
                        <a href="{{ asset('storage/' . $document->chemin) }}" target="_blank" class="text-blue-500 underline">Voir</a>
                    </td>
                    <td class="p-3">
    <div class="d-flex gap-2">
        <form action="{{ route('documents.destroy', $document->id) }}" method="POST" onsubmit="return confirm('Voulez-vous supprimer ce document ?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger text-white rounded">Supprimer</button>
        </form>

               <!--   <a href="{{ route('documents.show', $document->id) }}" class="btn btn-primary text-white rounded">Voir</a>-->
    </div>
</td>

                </tr>
                @endforeach
            </tbody>
        </table>
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
