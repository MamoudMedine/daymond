<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    protected $guarded = [];
    use HasFactory;

    function produit(){
        return $this->belongsTo(Produit::class);
    }
    function user(){
        return $this->belongsTo(User::class);
    }
}
