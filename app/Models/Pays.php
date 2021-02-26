<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    protected $table = 'pays';

    protected $guarded = [];

    public function devises()
    {
        return $this->hasMany(Devise::class);
    }
    public function produits()
    {
        return $this->belongsToMany(Produit::class);
    }
}
