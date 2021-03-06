<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table = 'categories';

    protected $guarded = [];

    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
}
