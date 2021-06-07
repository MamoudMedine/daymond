<?php

namespace App\Http\Livewire;

use App\Models\Etat;
use App\Models\Media;
use App\Models\Product;
use App\Models\Produit;
use Livewire\Component;
use App\Models\Categorie;
use Livewire\WithPagination;
use App\Models\SousCategorie;

class WelcomePage extends Component
{
    use WithPagination;
    public $search = "";
    public $searching = false;
    public $categorie_id = "";
    public $categories = null;
    public $sous_categorie_id = "";
    public $sous_categories = null;
    public $images;

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
//        $this->showCat($cat_id);
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
        $this->images = Media::where('source', 'slideshow')->get();

        $p = Produit::take(12)->get();
        $produits = $p;
        $ventes_flash = $produits->splice(6);

        if($this->search){
            $produits = $produits
                ->where('nom', 'like', '%'.$this->search.'%')
                // ->orWhere('last_name', 'like', '%'.$this->search.'%')
                // ->orWhere('email', 'like', '%'.$this->search.'%')
                // ->orWhere('phone', 'like', '%'.$this->search.'%')
                // ->orWhere('fingerprint', 'like', '%'.$this->search.'%')
                ;
        }

        $invisible_id = Etat::where('nom', 'Invisible')->first()->id;

        return view('livewire.welcome-page',
            [
                'produits' => $produits,
                'ventes_flash' => $ventes_flash,

                'produits' => Produit::latest()->where('nom', 'like', '%'.$this->search.'%')
                ->where('etat_id', '!=', $invisible_id)
                ->when($this->categorie_id, function($query) {
                    return $query->where('categorie_id', $this->categorie_id);
                })
                ->when($this->sous_categorie_id, function($query) {
                    return $query->where('sous_categorie_id', $this->sous_categorie_id);
                })
                ->get(),
            ]
        );
    }
}
