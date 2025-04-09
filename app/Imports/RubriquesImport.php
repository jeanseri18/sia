<?php

namespace App\Imports;

use App\Models\CategorieRubrique;
use App\Models\SousCategorieRubrique;
use App\Models\Bpu;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class RubriquesImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $currentCategorieId = null;
        $currentSousCategorieId = null;

        foreach ($rows as $row) {
          //  print('Code brut : ' . json_encode($row));

            // Check présence des colonnes essentielles
            if (!isset($row[0], $row[1])) continue;

            // Nettoyage des données
            $code = trim($row[0]);
            $designation = trim($row[1]);

            if (!$code || !$designation) continue;

            // Catégorie (ex: "0." ou "0.0")
            if ( $code=="categorie") {
               
                $categorie = CategorieRubrique::create([
                    'nom' => $designation,
                    'type' => 'bpu',
                ]);
                $currentCategorieId = $categorie->id;
            }            echo("cat".$currentCategorieId);


            // Sous-catégorie (ex: "0.1." ou "0.1.0")
            if ($code=="souscategorie") {
                if (!$currentCategorieId) continue;

                $sousCategorie = SousCategorieRubrique::create([
                    'nom' => $designation,
                    'type' => 'bpu',
                    'id_session' => $currentCategorieId,
                ]);
                $currentSousCategorieId = $sousCategorie->id;
            }
            echo("souscat".$currentSousCategorieId);

            // Élément BPU (ex: "0.1.1" ou "0.2.4")
            if ($code=="bpu") {
                if (!$currentSousCategorieId) continue;

                $materiaux = is_numeric($row[3]) ? (float) $row[3] : 0;
                $mainOeuvre = $materiaux * 0.30;
                $materiel = $materiaux * 0.10;

                $ds = $materiaux + $mainOeuvre + $materiel;
                $fc = $ds * 0.30;
                $fg = ($ds + $fc) * 0.15;
                $mn = ($ds + $fc + $fg) * 0.15;
                $pu_ht = $ds + $fc + $fg + $mn;
                $pu_ttc = $pu_ht * 1.18;

                Bpu::create([
                    'designation' => $designation,
                    'qte' => 0,
                    'materiaux' => $materiaux,
                    'main_oeuvre' => $mainOeuvre,
                    'materiel' => $materiel,
                    'unite' => trim($row[2]),
                    'debourse_sec' => $ds,
                    'frais_chantier' => $fc,
                    'frais_general' => $fg,
                    'marge_nette' => $mn,
                    'pu_ht' => $pu_ht,
                    'pu_ttc' => $pu_ttc,
                    'id_souscategorie' => $currentSousCategorieId,
                ]);
            }

            // Sinon, ignorer ligne silencieusement
            else {
                \Log::info('Code brut : ' . json_encode($code));
                \Log::info('Désignation brute : ' . json_encode($designation));
                \Log::warning("Ligne ignorée (code non reconnu) : " . json_encode($row->toArray()));
            }
        }
    }
}
