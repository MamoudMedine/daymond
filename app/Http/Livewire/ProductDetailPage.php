<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Produit;
use Livewire\Component;
use App\Models\Historique;
use Illuminate\Support\Facades\Auth;

class ProductDetailPage extends Component
{
    public $produit;
    public $isInvisible = false;

    protected $listeners = [ "productCopied", "productDownloaded" ];

    function productCopied($id){
        if(!$id){
            return;
        }
        $p = Produit::find($id);
        $p->nombre_copies++;
        $p->save();
    }

    function productDownloaded($id){
        if(!$id){
            return;
        }
        $p = Produit::find($id);
        $p->nombre_telechargements++;
        $p->save();
    }

    function mount($id){
        $this->produit = Produit::find($id);
        $this->produit->nombre_vues++;
        $this->produit->save();

        if($this->produit->is_invisible){
            // $this->emit('notify');
            return redirect()->back('/products');
        }
    }

    public function addToCart(int $productId): void
    {
        $added = Cart::add(Produit::where('id', $productId)->first());
        if(!$added){
            $this->emit('notify', ['message' => "Un seul produit par commande svp"]);
            return;
        }
        $this->emit('productAdded');
        $this->emit('notify', ['message' => "Produit ajouté au panier"]);
    }
    public function toggleAddToHistory(int $productId): void
    {
        if(!Auth::check()){
            $this->emit('notify', ['message' => "Veuillez vous connecter svp"]);
            return;
        }
        $user_id = Auth::user()->id;
        $historique = Historique::where('produit_id', $productId)->where('user_id', $user_id)->first();
        if($historique){
            $historique->delete();
            $this->emit('notify', ['message' => "Produit retiré des historiques"]);
        }else{
            $historique = Historique::create(['produit_id' => $productId, 'user_id' => $user_id]);
            $this->emit('notify', ['message' => "Produit ajouté aux historiques"]);
        }
    }

    public function render()
    {
        $produits_similaires = Produit::all()->take(4);

        return view('livewire.product-detail-page', [
            'produits_similaires' => $produits_similaires,
        ]);
    }
}
