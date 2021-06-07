<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cout extends Model
{
    protected $table = 'couts';

    protected $guarded = [];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    // public function type_cout()
    // {
    //     return $this->belongsTo(TypeCout::class);
    // }
}
