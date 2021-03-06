<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    protected $table = 'etats';

    protected $guarded = [];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
