<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\CartProduit;
use App\Http\Livewire\CartPage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Collection;
use function PHPUnit\Framework\returnValueMap;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];



    static function get(){
        if(!Auth::check()){
            return null;
        }
        $cart = self::where('user_id', Auth::user()->id)->first();
        if(!$cart){
            $cart = self::create([
                'user_id' => Auth::user()->id,
            ]);
        }
        $cart->produits;
        return $cart;
    }
    static function items()
    {
        $cart = self::get();
        $lines = new Collection([]);
        if($cart){
            $lines = CartProduit::where('cart_id', $cart->id)->get();
        }
        return $lines;
    }
    static function itemsCount(){
        $cart = self::get();
        if($cart){
            $count = CartProduit::where('cart_id', $cart->id)->get();
            return $count->count();
        }
        return 0;
    }

    static function add(Produit $produit)
    {

        $cart = self::get();
        $cart_id = $cart->id;
        // Limiting cart items to 1
        $lines = CartProduit::where('cart_id', $cart_id)->count();
        if($lines > 0){
            $produit_id = CartProduit::where('cart_id', $cart_id)->first()->produit_id;
            if($produit_id != $produit->id){
                return false;
            }
        }
        $line = CartProduit::where('cart_id', $cart_id)->where('produit_id', $produit->id)->first();
        if($line){
            $line->quantite += 1;
            $line->montant += $produit->prix;
            $line->save();
            return true;
        }
        $line = CartProduit::create([
            'cart_id' => $cart_id,
            'produit_id' => $produit->id,
            'montant' => $produit->prix,
        ]);
        return true;
    }

    static function remove(int $productId)
    {
        $cart = self::get();

        $line = CartProduit::where('cart_id', $cart->id)->where('produit_id', $productId)->first();
        if($line){
            $line->delete();
            return true;
        }
        return false;
    }
    static function reduce( $productId)
    {
        $cart = self::get();

        $line = CartProduit::where('cart_id', $cart->id)->where('produit_id', $productId)->first();
        if($line){
            if($line->quantite > 1){
                $line->quantite -= 1;
                $line->montant -= $line->produit->prix;
                $line->save();
                return true;
            }
            $line->delete();
            return true;
        }
        return false;
    }

    static function clear()
    {
        $cart = self::get();

        $lines = CartProduit::where('cart_id', $cart->id)->get();
        foreach($lines as $line){
            $line->delete();
        }
        return true;
    }
    static function total()
    {
        $cart = self::get();
        $total = 0;
        $lines = CartProduit::where('cart_id', $cart->id)->get();

        foreach ($lines as $line) {
            $total += $line->montant;
        }
        return $total;

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function produits()
    {
        return $this->belongsToMany(Produit::class)->withPivot("quantite", "montant");
    }
}
