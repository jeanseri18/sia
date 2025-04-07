<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategorieRubrique;

class CategorieBpuController extends Controller
{
    public function store(Request $request) {
        CategorieRubrique::create([
            'nom' => $request->nom,
            'type' => 'bpu', // Définir une valeur par défaut
        ]);
            return back();
    }

    public function update(Request $request, $id) {
        $categorie = CategorieRubrique::findOrFail($id);
        $categorie->update(['nom' => $request->nom]);
        return response()->json(['message' => 'Catégorie mise à jour !']);
    }

    public function destroy($id) {
        CategorieRubrique::findOrFail($id)->delete();
        return back();
    }
}
