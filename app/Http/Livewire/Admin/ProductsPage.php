<?php

namespace App\Http\Livewire\Admin;

use App\Models\Etat;
use App\Models\Media;
use App\Models\Produit;
use Livewire\Component;
use App\Models\Categorie;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class ProductsPage extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $search;
    public $etat_id;
    public $transaction_id=null;
    public $categorie_id=null;
    public $prix;
    public $prix_suggestion;
    public $produit_tab=[];
    public $count = 15;

    protected $listeners = [ "deleteProduct", "deleteImage"];

//    public function paginationView()
//    {
//        return 'admin.products-pagination-links';
//    }
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


    public function mount(Request $request)
    {
        // dd($request->all());
        $etat = $request->etat;
        if($etat){
            $etat = ucfirst($etat);
            $e = Etat::where('nom', $etat)->first();
            if($e){
                $this->etat_id = $e->id;
                $this->produits = Produit::where('etat_id', $this->etat_id);
            }
        }
    }

    function toggleVisibility($id){
        $p = Produit::find($id);
        $is_invisible = $p->etat->nom == "Invisible";

        if($is_invisible){
            $inv = Etat::where('nom', 'Disponible')->first();
            if(!$inv){
                $inv = Etat::create(['nom' => 'Disponible']);
            }
            $inv_id = $inv->id;
            $p->etat_id = $inv_id;
            $p->save();
            $this->emit('notify', ['message' => "Produit marqué Disponible"]);
            return;
        }

        $inv = Etat::where('nom', 'Invisible')->first();
        if(!$inv){
            $inv = Etat::create(['nom' => 'Invisible']);
        }
        $inv_id = $inv->id;
        $p->etat_id = $inv_id;
        $p->save();
        $this->emit('notify', ['message' => "Produit marqué Invisible"]);
        return ;
    }
    function toggleAvailability($id){
        $p = Produit::find($id);
        $is_invisible = $p->etat->nom == "Indisponible";

        if($is_invisible){
            $inv = Etat::where('nom', 'Disponible')->first();
            if(!$inv){
                $inv = Etat::create(['nom' => 'Disponible']);
            }
            $inv_id = $inv->id;
            $p->etat_id = $inv_id;
            $p->save();
            $this->emit('notify', ['message' => "Produit marqué Disponible"]);
            return;
        }

        $inv = Etat::where('nom', 'Indisponible')->first();
        if(!$inv){
            $inv = Etat::create(['nom' => 'Indisponible']);
        }
        $inv_id = $inv->id;
        $p->etat_id = $inv_id;
        $p->save();
        $this->emit('notify', ['message' => "Produit marqué Indisponible"]);
        return ;
    }

    function deleteProduct($id){
        $produit = Produit::find($id);
        $n = $produit->nom;
        $produit->delete();
        // $a = env('APP_URL')."/admin/products/$id";
        $this->emit('notify', ['message' => "Produit $n supprimé !"]);
//        return redirect()->route('products');
        // $this->emit('productCreated', $produit);
    }

    function deleteImage($id){
        $media = Media::find($id);
        $media->delete();
        // $a = env('APP_URL')."/admin/products/$id";
        $this->emit('notify', ['message' => "Image supprimée avec succès !"]);
         //return redirect()->route('products');
        $this->emit('imageDeleted');
    }

    function render(){


        return view('livewire.admin.products-page',
            [
                'produits' => Produit::latest()->where('nom', 'like', '%'.$this->search.'%')
                ->when($this->categorie_id, function($query) {
                    return $query->where('categorie_id', $this->categorie_id);
                })
                ->when($this->transaction_id, function($query) {
                    return $query->where('transaction_id', $this->transaction_id);
                })
                ->when($this->etat_id, function($query) {
                    return $query->where('etat_id', $this->etat_id);
                })
                ->paginate($this->count),

                'etats'=> Etat::all(),
                'categories' => Categorie::all(),
                'transactions' => Transaction::all(),
            ]
        )->extends('layouts.admin');
    }
}
