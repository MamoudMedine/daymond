<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\CartProduit;
use App\Models\Produit;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartPage extends Component
{
    public $cart;

    protected $listeners = [
        'clearCart' => '$refresh',
        'addProductToCart' => "addToCart",
    ];

    public function removeFromCart($productId)
    {
        Cart::remove($productId);
        $this->emit('productRemoved');
        $this->emit('notify', ['message' => "Produit retiré"]);
    }
    public function reduceFromCart(int $productId)
    {
        $count = Cart::itemsCount();
        Cart::reduce($productId);

        $new_count = Cart::itemsCount();
        if($new_count < $count){
            $this->emit('productRemoved');
            $this->emit('notify', ['message' => "Produit retiré"]);
        }else{
            $this->emit('notify', ['message' => "Quantité mise à jour"]);
        }
    }
    public function addToCart(int $productId)
    {
        $produit = Produit::where('id', $productId)->first();
        Cart::add($produit);

        $this->emit('notify', ['message' => "Quantité mise à jour"]);
    }

    public function clearCart()
    {
        Cart::clear();
        $this->emit('clearCart');
    }
    public function checkout()
    {
        $this->emit('openCommandeFormModal');
    }

    public function mount()
    {
    }
    public function render()
    {
        return view('livewire.cart-page');
    }
}
