<?php

namespace App\Http\Livewire;

use App\Models\Etat;
use App\Models\Produit;
use Livewire\Component;
use App\Models\Categorie;
use Livewire\WithPagination;
use App\Models\SousCategorie;
use Illuminate\Database\Eloquent\Collection;

class ProductsPage extends Component
{
    use WithPagination;
    public $search = "";
    public $searching = false;
    public $categorie_id = "";
    public $categories = null;
    public $sous_categorie_id = "";
    public $sous_categories = null;

    public $showCat = '';
    public $showSousCat = '';

    protected $listeners = ["getCategorieId", "getSousCategorieId"];

    function getCategorieId($cat_id){
        $this->categorie_id = '';
        $this->sous_categorie_id = '';
        $this->categorie_id = $cat_id;
        $this->showCat = '';
        $cat = Categorie::find($this->categorie_id);
        $this->showCat = $cat->nom;
        $this->resetPage();
    }

    function getSousCategorieId($cat_id, $scat_id){
        $this->categorie_id = '';
        $this->sous_categorie_id = '';
        $this->categorie_id = $cat_id;
        $this->sous_categorie_id = $scat_id;
        $this->showSousCat = '';
        $scat = SousCategorie::find($this->sous_categorie_id);
        $this->showSousCat = $scat->nom;
        $prod = Produit::where('categorie_id', $cat_id)->where('sous_categorie_id', $scat_id)->get();
        if(count($prod) <= 0){
            $this->getCategorieId($cat_id);
        }
        $this->resetPage();
    }

    function updatedCategorieId($id){
        $this->sous_categories = SousCategorie::where('categorie_id', $id)->get();
        $this->resetPage();
    }


    function mount(){
        $this->categories = Categorie::all();
    }
    public function render()
    {
        // $p = Produit::latest()->take(12)->get();
        // $ventes_flash = $p;
        // $produits = $p->splice(6);
        $invisible_id = Etat::where('nom', 'Invisible')->first()->id;
        return view('livewire.products-page',
            [
                'produits' => Produit::latest()->where('nom', 'like', '%'.$this->search.'%')
                ->where('etat_id', '!=', $invisible_id)
                ->when($this->categorie_id, function($query) {
                    return $query->where('categorie_id', $this->categorie_id);
                })
                ->when($this->sous_categorie_id, function($query) {
                    return $query->where('sous_categorie_id', $this->sous_categorie_id);
                })
                ->get(),

                // 'ventes_flash' => $ventes_flash,
            ]
        );
    }
}
