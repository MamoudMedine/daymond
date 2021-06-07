<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    const LANCEE = "LANCEE";
    const EN_COURS = "EN_COURS";
    const ANNULEE = "ANNULEE";
    const VALIDEE = "VALIDEE";
    protected $table = 'commandes';

    protected $guarded = [];


    function scopeNouvelles($query){
        return $query->where('status', self::LANCEE);
    }
    function scopeLancees($query){
        return $query->where('status', self::LANCEE);
    }
    function scopeEn_cours($query){
        return $query->where('status', self::EN_COURS);
    }
    function scopeEnCours($query){
        return $query->where('status', self::EN_COURS);
    }
    function scopeAnnulees($query){
        return $query->where('status', self::ANNULEE);
    }
    function scopeValidees($query){
        return $query->where('status', self::VALIDEE);
    }

    function getColorAttribute()
    {
        $r = 'gray';
        switch ($this->status) {
            case self::LANCEE:
                $r = 'yellow';
                break;
            case self::EN_COURS:
                $r = 'blue';
                break;
            case self::VALIDEE:
                $r = 'green';
                break;
            case self::ANNULEE:
                $r = 'red';
                break;
            default:
                # code...
                break;
        }
        return $r;
    }

    function getReferenceAttribute(){
        return "#".$this->id;
    }

    function getAmountAttribute(){
        $qte = $this->quantite_produit;
        // $produit = $this->produit;
        $prix_vente = $this->prix_vente;
        return $qte * $prix_vente;
    }
    function getPaymentAmountAttribute(){
        $qte = $this->quantite_produit;
        $produit = $this->produit;
        $amount_sold = $this->amount;
        $amount = $qte * $produit->prix;
        $p = $amount_sold - $amount;
        if($p == 0){
            $p = $amount;
        }
        return $p;
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class, 'produit_id');
    }
    public function typecommande()
    {
        return $this->belongsTo(TypeCommande::class, 'type_commande_id');
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
