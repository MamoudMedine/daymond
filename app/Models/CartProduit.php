<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartProduit extends Model
{
    use HasFactory;
    protected $table = "cart_produit";
    protected $guarded = [];

    function cart(){
        return $this->belongsTo(Cart::class);
    }
    function produit(){
        return $this->belongsTo(Produit::class);
    }
}
