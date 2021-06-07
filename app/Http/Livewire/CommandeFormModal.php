<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\Cart;
use App\Models\User;
use App\Models\Client;
use Livewire\Component;
use App\Models\Commande;
use App\Models\Utilisateur;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class CommandeFormModal extends Component
{
    public $displayCommandeModal = false;

    public $client = [];

    public $rules = [
        'client.nom' => "required",
        'client.contact' => "required",
        'client.localisation' => "required",
        'client.date_livraison' => "required",
        'client.details' => "nullable",
        'client.prix_vente' => "required",
    ];

    protected $listeners = ['openCommandeFormModal', 'closeCommandeFormModal'];

    function openCommandeFormModal(){
        $this->displayCommandeModal = true;

    }

    function closeCommandeFormModal(){
        $this->displayCommandeModal = false;
    }

    function updated($foo){
        $this->validateOnly($foo);
    }

    function save(){
        if(!Auth::check()){
            return;
        }

        $data = $this->validate();
        $data = $data['client'];

        $client = Client::where('contact', $data['contact'])->first();
        if(!$client){
            $client = Client::create([
                'nom' => $data['nom'],
                'contact' => $data['contact'],
                'adresse' => $data['localisation'],
            ]);
        }
        $user_id = Auth::user()->id;

        foreach(Cart::items() as $item){
            Commande::create([
//                'date' => Carbon::now(),
                'quantite_produit' => $item->quantite,
                'prix_vente' => $data['prix_vente'],
                'autre_details' => isset($data['details']) ? $data['details'] : null,
                'date_livraison' => $data['date_livraison'],
                'status' => Commande::LANCEE,
                'produit_id' => $item->produit->id,
                'utilisateur_id' => $user_id,
                'client_id' => $client->id,
            ]);
        }
        Cart::clear();
        $a = env('APP_URL')."/myorders/";
        $this->emit('notify', ['message' => "Commande validée !", 'action' => "Voir", 'url' => "$a"]);
        $this->emit('commandeUpdated');
        $this->emit('clearCart');

        $this->closeCommandeFormModal();
        $this->client = [];
        return;
    }


    function mount(){
        if(Cart::items()->first()){
            $this->client['prix_vente'] = Cart::items()->first()->produit->prix;
        }
    }

    public function render()
    {
        if(!Auth::check()){
            return view('empty');
        }
        return view('livewire.commande-form-modal');
    }
}
