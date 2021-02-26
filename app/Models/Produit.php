<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $table = 'produits';

    protected $guarded = [];

    public function medias()
    {
        return $this->hasMany(Media::class);
    }
    public function cout()
    {
        return $this->hasOne(Cout::class);
    }
    public function commande()
    {
        return $this->belongsTo(Commande::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function etat()
    {
        return $this->belongsTo(Etat::class);
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }
    public function livraison()
    {
        return $this->belongsTo(Livraison::class);
    }

    public function localisations()
    {
        return $this->belongsToMany(Localisation::class);
    }
    public function pays()
    {
        return $this->belongsToMany(Pays::class);
    }
}
