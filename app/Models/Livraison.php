<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livraison extends Model
{
    protected $table = 'livraisons';

    protected $guarded = [];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
