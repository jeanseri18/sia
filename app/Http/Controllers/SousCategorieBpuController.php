<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SousCategorieRubrique;

class SousCategorieBpuController extends Controller
{
    public function store(Request $request) {
        SousCategorieRubrique::create([
            'nom' => $request->nom,
            'id_session' => $request->id_session, 
            'type' => 'bpu', 
            // Assure-toi que cette valeur est envoyée
        ]);        return back();
    }

    public function update(Request $request, $id) {
        $sousCategorie = SousCategorieRubrique::findOrFail($id);
        $sousCategorie->update(['nom' => $request->nom]);
        return response()->json(['message' => 'Sous-catégorie mise à jour !']);
    }

    public function destroy($id) {
        SousCategorieRubrique::findOrFail($id)->delete();
        return back();
    }
}
