<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Payment extends Model
{
    protected $guarded = [];
    function commande(){
        return $this->belongsTo(Commande::class);
    }
    use HasFactory;
}
