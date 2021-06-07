<?php

namespace App\Http\Livewire;

use App\Models\Commande;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyOrdersPage extends Component
{
    protected $listeners = [
        'commandeUpdated' => '$refresh'
    ];

    function mount(){
    }

    public function render()
    {
        if(!Auth::check()){
            return view('empty') ;
        }
        $commandes = Commande::where('utilisateur_id', Auth::user()->id)->latest()->paginate(10);
        return view('livewire.my-orders-page',
        [ 'commandes' => $commandes,]);
    }
}
