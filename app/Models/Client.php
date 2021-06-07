<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $guarded = [];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
}
