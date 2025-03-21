@extends('layouts.app')

@section('content')

    @include('sublayouts.contrat')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
            <div class="card" style="background-color: #033765;height:200px">
                </div>
                <br>
                <br>
                <div class="card" style="background-color: #033765;height:100px">
                </div>
            </div>
            <div class="col-md-9">
            <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-12">
            <div class="container mx-auto p-6">
    <div class="row">
        @php
            $cards = [
                'Montant du contrat' => 123000,
                'Coût de revient Prév.' => 123000,
                'Coût de revient Réel' => 123000,
                'Écart' => 123000,
                'DS Prévisionnel' => 123000,
                'DS Réalisé' => 123000,
                'FC Réalisé' => 123000,
                'CA Réalisé' => 123000
            ];
        @endphp

        @foreach ($cards as $title => $amount)
            <div class="col-md-3 pt-3">
          <div class=" card border-0 rounded-lg  text-start " style="background-color: #5EB3F6; padding: 10px; ">
                <p class="text-xl font-bold text-blue-600">{{ $title }}</p>
                <h3 class="text-lg font-semibold text-gray-700">{{ number_format($amount, 0, ',', ' ') }} CFA</h3>

            </div>
            </div>
        @endforeach
    </div>
</div>

<br>
<br>
                <h2>Autres informations</h2>
<br>
                <div class="card border-0" style="background-color: #F3F6F9;">
                  
                    <div class="card-body">

                        <form action="{{ route('contrats.update', $contrat->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 pb-3">
                                    <label for="ref_contrat">Référence du contrat</label>
                                    <input type="text" class="form-control" id="ref_contrat" name="ref_contrat" value="{{ $contrat->ref_contrat }}" required>
                                </div>

                                <div class="col-md-6 pb-3">
                                    <label for="nom_contrat">Nom du contrat</label>
                                    <input type="text" class="form-control" id="nom_contrat" name="nom_contrat" value="{{ $contrat->nom_contrat }}" required>
                                </div>

                                <div class="col-md-6 pb-3">
                                    <label for="date_debut">Date de début</label>
                                    <input type="date" class="form-control" id="date_debut" name="date_debut" value="{{ $contrat->date_debut }}" required>
                                </div>

                                <div class="col-md-6 pb-3">
                                    <label for="date_fin">Date de fin</label>
                                    <input type="date" class="form-control" id="date_fin" name="date_fin" value="{{ $contrat->date_fin }}">
                                </div>

                                <div class="col-md-6 pb-3">
                                    <label for="type_travaux">Type de travaux</label>
                                    <input type="text" class="form-control" id="type_travaux" name="type_travaux" value="{{ $contrat->type_travaux }}" required>
                                </div>

                                <div class="col-md-6 pb-3">
                                    <label for="taux_garantie">Taux de garantie</label>
                                    <input type="number" step="0.01" class="form-control" id="taux_garantie" name="taux_garantie" value="{{ $contrat->taux_garantie }}" required>
                                </div>

                                <div class="col-md-6 pb-3">
                                    <label for="client_id">Client</label>
                                    <select class="form-control" id="client_id" name="client_id" required>
                                        @foreach($clients as $client)
                                            <option value="{{ $client->id }}" @if($contrat->client_id == $client->id) selected @endif>{{ $client->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 pb-3">
                                    <label for="montant">Montant</label>
                                    <input type="number" step="0.01" class="form-control" id="montant" name="montant" value="{{ $contrat->montant }}" required>
                                </div>

                                <div class="col-md-6 pb-3">
                                    <label for="statut">Statut</label>
                                    <select class="form-control" id="statut" name="statut" required>
                                        <option value="en cours" @if($contrat->statut == 'en cours') selected @endif>En cours</option>
                                        <option value="terminé" @if($contrat->statut == 'terminé') selected @endif>Terminé</option>
                                        <option value="annulé" @if($contrat->statut == 'annulé') selected @endif>Annulé</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Mettre à jour le contrat</button>
                        </form>

                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
