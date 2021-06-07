<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\Etat;
use App\Models\Pays;
use App\Models\Media;
use App\Models\Niveau;
use App\Models\Commande;
use App\Models\TypeCout;
use App\Models\Categorie;
use App\Models\Livraison;
use App\Models\Transaction;
use App\Models\TypeProduit;
use App\Models\Localisation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit extends Model
{

    use SoftDeletes;
    protected $table = 'produits';

    protected $guarded = [];


    function getCopyAttribute(){
        // $r = env('APP_URL')."/products/".$this->id;
        $n = "\n";
        $r = "";
        $r .= "Produit";
        $r .= $n.$this->title."";
        $r .= $n.$this->description;
        $r .= $n.$this->price;
        $r .= $n.$this->delivery;
        $r .= "";
        return $r;
    }

    function getIsUnavailableAttribute(){
        if($this->etat){
            if($this->etat->nom == "Indisponible"){
                return true;
            }
        }
    }
    function getIsinvisibleAttribute(){
        if($this->etat){
            if($this->etat->nom == "Invisible"){
                return true;
            }
        }
    }
    function getIsSoldoutAttribute(){
        if ($this->etat) {
            if ($this->etat->nom == "Invisible") {
                return true;
            }
        }
    }
    function getCanOrderAttribute(){
        $r = true;
        if($this->is_soldout || $this->is_invisible || $this->is_unavailable){
            $r = false;
        }
        return $r;
    }

    function getColorAttribute(){
        $r = 'green';
        if($this->is_soldout){
            $r = "orange";
        }
        if($this->is_invisible){
            $r = "purple";
        }
        if($this->is_unavailable){
            $r = "red";
        }
        return $r;
    }

    function getIsInHistoriqueAttribute(){
        $pId = $this->id;
        $r = false;
        if(!Auth::check()){
            return $r;
        }
        $uId = Auth::user()->id;

        $hist = Historique::where('produit_id', $pId)->where('utilisateur_id', $uId)->first();
        if($hist){
            $r = true;
        }
        return $r;
    }


    public function media()
    {
        return $this->hasMany(Media::class, 'source_id')->whereSource('produit');
    }
    public function type()
    {
        return $this->belongsTo(TypeProduit::class);
    }
    public function typecout()
    {
        return $this->belongsTo(TypeCout::class, 'type_cout_id');
    }
    public function commandes()
    {
        // return $this->belongsToMany(Commande::class);
        return $this->hasMany(Commande::class);
    }
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    public function sous_categorie()
    {
        return $this->belongsTo(SousCategorie::class);
    }
    public function etat()
    {
        return $this->belongsTo(Etat::class);
    }
    public function historiques()
    {
        return $this->hasMany(Historique::class);
    }
    public function diffusions()
    {
        return $this->hasMany(Diffusion::class);
    }
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
    public function niveau()
    {
        return $this->belongsTo(Niveau::class);
    }
    public function livraison()
    {
        return $this->hasMany(Livraison::class);
    }

    public function localisation()
    {
        return $this->belongsTo(Localisation::class);
    }
    public function pays()
    {
        return $this->belongsToMany(Pays::class);
    }
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
}
