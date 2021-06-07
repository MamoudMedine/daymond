<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCommande extends Model
{
    protected $table = 'type_commande';

    protected $guarded = [];

    public function commande()
    {
        return $this->hasMany(Commande::class);
    }
}
