<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model {
    use HasFactory;

    protected $table = 'facture';
    protected $fillable = ['num', 'id_prestation', 'id_contrat', 'id_artisan', 'montant', 'decompte', 'retenue', 'date_emission', 'statut'];

    public function prestation() {
        return $this->belongsTo(Prestation::class, 'id_prestation');
    }

    public function contrat() {
        return $this->belongsTo(Contrat::class, 'id_contrat');
    }

    public function artisan() {
        return $this->belongsTo(Artisan::class, 'id_artisan');
    }
}
