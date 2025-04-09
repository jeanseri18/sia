<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\RubriquesImport;
class ImportController extends Controller
{

    public function index()
    {
        // Afficher la vue d'importation
        return view('import');
    }
  


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);
    
        Excel::import(new RubriquesImport, $request->file('file'));
    
        return back()->with('success', 'Importation réussie !');
    }
    
}
