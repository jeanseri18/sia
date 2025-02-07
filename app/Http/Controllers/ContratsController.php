<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Projet;
use App\Models\ClientFournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContratsController extends Controller
{
    // Afficher le formulaire de création d'un contrat
    public function create()
    {

                // Récupérer l'ID du bus depuis la session
                $id_bu = session('selected_bu');
    
                // Vérifier si l'ID du bus est présent dans la session
                if (!$id_bu) {
                    return redirect()->route('select.bu')->withErrors(['error' => 'Veuillez sélectionner un bus avant d\'accéder à cette page.']);
                }
            
                // Récupérer les clients associés à l'ID du bus
                $clients = ClientFournisseur::where('type', 'client')
                                            ->where('id_bu', $id_bu)  // Filtrage selon l'ID du bus
                                            ->get();
        $projet_id = session('projet_id');
        return view('contrats.create', compact('projet_id','clients'));
    }

    // Enregistrer un nouveau contrat
    public function store(Request $request)
    {
        
        $request->validate([
            'ref_contrat' => 'required|unique:contrats',
            'nom_contrat' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date',
            'type_travaux' => 'required',
            'taux_garantie' => 'required|numeric',
            'client_id' => 'required|exists:client_fournisseurs,id',
            'montant' => 'required|numeric',
            'statut' => 'required|in:en cours,terminé,annulé',
        ]);

        Contrat::create([
            'ref_contrat' => $request->ref_contrat,
            'nom_contrat' => $request->nom_contrat,
            'id_projet' => session('projet_id'),
          
            'nom_projet' => session('projet_nom'),
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'type_travaux' => $request->type_travaux,
            'taux_garantie' => $request->taux_garantie,
            'client_id' => $request->client_id,
            'montant' => $request->montant,
            'statut' => $request->statut,
            'decompte' => $request->decompte ?? false,
        ]);

        return redirect()->route('contrats.index')->with('success', 'Contrat créé avec succès!');
    }

    // Afficher les contrats
    public function index()
    {
        $projet_id = session('projet_id');
        $contrats = Contrat::where('id_projet', $projet_id)->get();
        return view('contrats.index', compact('contrats'));
    }

    // Afficher le formulaire d'édition d'un contrat
    public function edit($id)
    {
        $contrat = Contrat::findOrFail($id);
        return view('contrats.edit', compact('contrat'));
    }

    // Mettre à jour un contrat
    public function update(Request $request, $id)
    {
        $request->validate([
            'ref_contrat' => 'required',
            'nom_contrat' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'nullable|date',
            'type_travaux' => 'required',
            'taux_garantie' => 'required|numeric',
            'client_id' => 'required|exists:users,id',
            'montant' => 'required|numeric',
            'statut' => 'required|in:en cours,terminé,annulé',
        ]);

        $contrat = Contrat::findOrFail($id);
        $contrat->update($request->all());

        return redirect()->route('contrats.index')->with('success', 'Contrat mis à jour avec succès!');
    }

    // Supprimer un contrat
    public function destroy($id)
    {
        $contrat = Contrat::findOrFail($id);
        $contrat->delete();

        return redirect()->route('contrats.index')->with('success', 'Contrat supprimé avec succès!');
    }
    // Afficher les détails d'un contrat
public function show($id)

    {  
        $contrat = Contrat::findOrFail($id);
        session(['contrat_id' => $contrat->id,'contrat_nom'=>$contrat->nom_contrat,'ref_contrat'=>$contrat->ref_contrat]);

    return view('contrats.show', compact('contrat'));
}

}
