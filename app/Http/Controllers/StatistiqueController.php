<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Article;
use App\Models\BrouillardCaisse;
use Illuminate\Support\Facades\DB;

class StatistiqueController extends Controller
{
    public function index()
    {  
          // Récupérer l'ID du bus depuis la session
    $id_bu = session('selected_bu');

    // Vérifier si l'ID du bus est présent dans la session
    if (!$id_bu) {
        return redirect()->route('select.bu')->withErrors(['error' => 'Veuillez sélectionner un bus avant d\'accéder à cette page.']);
    }

        // Nombre de projets en cours
 // Nombre de projets en cours pour le bus sélectionné
 $projetsEnCours = Projet::where('statut', 'en cours')
 ->where('bu_id', $id_bu)
 ->count();
       // Revenus totaux pour le bus sélectionné
       $revenusTotaux = BrouillardCaisse::where('type', 'Entrée')
       ->where('bus_id', $id_bu)
       ->sum('montant');

// Dépenses totales pour le bus sélectionné
$depensesTotales = BrouillardCaisse::where('type', 'Sortie')
         ->where('bus_id', $id_bu)
         ->sum('montant');
        // Articles en stock (somme des quantités en stock)
        $articlesEnStock = Article::sum('quantite_stock');

        $evolutionFinanciere = BrouillardCaisse::select(
            DB::raw("DATE_FORMAT(created_at, '%Y-%m') as mois"),
            DB::raw("SUM(CASE WHEN type = 'Entrée' THEN montant ELSE 0 END) as total_entrees"),
            DB::raw("SUM(CASE WHEN type = 'Sortie' THEN montant ELSE 0 END) as total_sorties")
        )
        ->where('bus_id', $id_bu)
        ->groupBy('mois')
        ->orderBy('mois', 'ASC')
        ->get();


        return view('statistiques.index', compact(
            'projetsEnCours',
            'revenusTotaux',
            'depensesTotales',
            'articlesEnStock',
            'evolutionFinanciere'
        ));
    }
}
