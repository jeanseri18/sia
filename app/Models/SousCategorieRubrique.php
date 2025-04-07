<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SousCategorieRubrique extends Model
{
    use HasFactory;

    protected $table = 'souscategorierubriques';

    protected $fillable = ['nom', 'type', 'id_session'];

    public function categorie()
    {
        return $this->belongsTo(CategorieRubrique::class, 'id_session');
    }
    public function bpus()
    {
        return $this->hasMany(Bpu::class, 'id_souscategorie');
    }
    
}
