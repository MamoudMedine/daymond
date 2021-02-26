<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    protected $table = 'utilisateurs';

    protected $guarded = [];

    public function adresse()
    {
        return $this->belongsTo(Adresse::class);
    }
    public function clients()
    {
        return $this->hasMany(Client::class);
    }
    public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    public function diffusions()
    {
        return $this->hasMany(Diffusion::class);
    }

}
