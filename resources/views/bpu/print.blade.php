


<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }
    td, th {
        border: 1px solid black;
        padding: 10px;
    }
    tr {
        border-bottom: 1px solid black;
    }
</style>

<div class="container-fluid" style="font-size: 12px;">
    <h2 class="mb-4">Bordereaux de prix unitaires</h2>

    <!-- Formulaire d'ajout de catégorie -->


    @foreach ($categories as $categorie)
        <table width="100%" class="text-center mt-4" border="1" bordercolor="black">
            <tr  >
                <td colspan="11">
                    <div class="row">
                    <div class="col-md-8">
                   {{$categorie->id}}  {{ $categorie->nom }} </div>
 </div>
                </td>
            </tr>

            <!-- Formulaire d'ajout de sous-catégorie -->
           

            @foreach ($categorie->sousCategories as $sousCategorie)
            <tr  >
                <td colspan="11">
                    <div class="row">
                    <div class="col-md-8">
                   {{$categorie->id}}.{{$sousCategorie->id}}   {{$sousCategorie->nom }} </div>
 </div>
                </td>
            </tr>

                @foreach ($sousCategorie->bpus as $bpu)
          


                    <tr>
                        <td>Designation</td>
                        <td>Quantité</td>
                        <td>Designation</td>
                        <td>Materiaux</td>
                        <td>Unité</td>
                        <td>Main d'oeuvre</td>
                        <td>Deboursé sec</td>
                        <td>Frais de chantier</td>
                        <td>Frais General</td>
                        <td>Prix HT</td>
                        <td>Prix TTC</td>

                    </tr>
                    
                    @foreach ($sousCategorie->bpus as $bpu)
                        <tr>
                            <td> {{$categorie->id}}.{{$sousCategorie->id}}{{ $bpu->id }} {{ $bpu->designation }}</td>
                            <td>{{ $bpu->qte }}</td>
                            <td>{{ $bpu->designation }}</td>
                            <td>{{ $bpu->materiaux }}</td>
                            <td>{{ $bpu->unite }}</td>
                            <td>{{ $bpu->main_oeuvre }}</td>
                            <td>{{ $bpu->debourse_sec }}</td>
                            <td>{{ $bpu->frais_chantier }}</td>
                            <td>{{ $bpu->frais_general }}</td>
                            <td>{{ $bpu->pu_ht }}</td>
                            <td>{{ $bpu->pu_ttc }}</td>
                        </tr>


                    @endforeach
                @endforeach
            @endforeach
        </table>
        <br>
    @endforeach
</div>


