<?php


namespace App\Http\Controllers;

use App\Models\Rubrique;
use Illuminate\Http\Request;

class RubriqueController extends Controller
{
    public function store(Request $request)
    {
        Rubrique::create([
            'nom' => $request->nom,
            'id_soussession' => $request->id_soussession,
            'type' => 'bpu',  // Lié à la sous-catégorie
        ]);

        return back();
    }

    public function update(Request $request, $id)
    {
        $rubrique = Rubrique::findOrFail($id);
        $rubrique->update(['nom' => $request->nom]);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        Rubrique::destroy($id);

        return back();
    }
}
