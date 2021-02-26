<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $table = 'commandes';

    protected $guarded = [];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
