<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientFournisseur extends Model {
    use HasFactory;

    protected $fillable = [
        'code', 'categorie', 'nom_raison_sociale', 'prenoms', 'type', 'n_rccm', 'n_cc',
        'regime_imposition', 'delai_paiement', 'mode_paiement', 'adresse_localisation',
        'boite_postale', 'secteur_activite', 'email', 'telephone', 'statut', 'id_bu'
    ];
    public function bus()
    {
        return $this->belongsTo(Bu::class, 'id_bu');
    }
    
    protected static function boot() {
        parent::boot();
        static::creating(function ($clientFournisseur) {
            $clientFournisseur->code = 'CF-' . strtoupper(uniqid());
        });
    }
}
