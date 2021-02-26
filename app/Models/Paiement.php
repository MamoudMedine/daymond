<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $table = 'paiements';

    protected $guarded = [];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
}
