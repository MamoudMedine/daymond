<?php

namespace App\Http\Livewire\Admin;

use App\Models\Etat;
use App\Models\Produit;
use Livewire\Component;
use App\Models\Categorie;
use App\Models\Transaction;
use Livewire\WithPagination;

class ProductsTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $etat_id;
    public $transaction_id=null;
    public $category_id=null;
    public $prix;
    public $prix_suggestion;
    public $produit_tab=[];



    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingPieceId()
    {
        $this->resetPage();
    }
    public function updatedSiteId($id)
    {
        $this->etat_id=$id;
        $this->prix = Etat::where('etat_id', $id)->get();
    }

    public function updatedEtatId($id)
    {
        // $this->transaction_id=$id;
        // $this->prix_suggestion = Piece::where('transaction_id', $id)->get();
    }




    public function showProduit(Produit $produit)
    {
        $this->emit("showProduit", $produit);
    }

    public function edit($id)
    {
        $this->emit("produitUpdating", $id);
    }


    public function mount()
    {
        // $this->sites_edit= Site::all();
        // $this->categories_edit =Categorie::all();
        // $this->prix = Etat::all();
        // $this->prix_suggestion =  Piece::all();
    }

    public function render()
    {
        return view('livewire.admin.products-table',
            [
                'produits' => Produit::where('nom', 'like', '%'.$this->search.'%')
                ->when($this->category_id, function($query) {
                    return $query->where('category_id', $this->category_id);
                })
                ->when($this->transaction_id, function($query) {
                    return $query->where('transaction_id', $this->transaction_id);
                })
                ->when($this->etat_id, function($query) {
                    return $query->where('etat_id', $this->etat_id);
                })
                ->paginate(5),

                'etats'=> Etat::all(),
                'categories' => Categorie::all(),
                'transactions' => Transaction::all(),

            ]
        )->extends('layouts.admin');
    }
}
