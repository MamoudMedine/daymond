<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Niveau extends Model
{
    protected $table = 'niveaux';

    protected $guarded = [];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
