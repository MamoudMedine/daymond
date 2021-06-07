<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Utilisateur extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'utilisateurs';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function adresse()
    {
        return $this->belongsTo(Adresse::class, 'adresse_id');
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

    public function diffusion()
    {
        return $this->belongsTo(Diffusion::class);
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }
    public function pays()
    {
        return $this->belongsTo(Pays::class);
    }

}
