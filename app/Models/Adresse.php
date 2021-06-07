<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    protected $table = 'adresses';

    protected $guarded = [];

    public function utilisateurs()
    {
        return $this->hasMany(Utilisateur::class);
    }
}
