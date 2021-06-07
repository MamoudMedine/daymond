<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CartCounterIcon extends Component
{
    public $cartTotal = 0;

    protected $listeners = [
        'productAdded' => 'updateCartTotal',
        'productRemoved' => 'updateCartTotal',
        'clearCart' => 'updateCartTotal'
    ];

    public function mount()
    {
        if(Auth::check()){
            $this->cartTotal = Cart::itemsCount();
        }
    }


    public function updateCartTotal()
    {
        if(Auth::check()){
            $this->cartTotal = Cart::itemsCount();
        }
    }
    public function render()
    {
        return view('livewire.cart-counter-icon');
    }
}
