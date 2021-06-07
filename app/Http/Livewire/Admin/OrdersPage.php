<?php

namespace App\Http\Livewire\Admin;

use App\Models\Etat;
use App\Models\Payment;
use Livewire\Component;
use App\Models\Commande;
use App\Models\Categorie;
use Livewire\WithPagination;

class OrdersPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $search = "";
    public $status;

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function updatingPieceId()
    {
        $this->resetPage();
    }

    function toggleStatus($id, $status){
        $com = Commande::find($id);
        if(!$com){
            return;
        }
        $com->status = $status;
        $com->save();

        if($status == "VALIDEE"){
            if($com->payment){
                return;
            }
            Payment::create([
                'commande_id' => $com->id,
                'montant' => $com->payment_amount,
            ]);
            $this->emit('commandeValidee');
        }

        $this->emit('notify', ['message' => "Commande marquée $status"]);
    }
    public function render()
    {
        return view('livewire.admin.orders-page',
        [
            'commandes' => Commande::latest()
            ->when($this->status, function($query) {
                return $query->where('status', $this->status);
            })
            ->get(),
            // ->paginate(5),
            'count_nouvelles' => Commande::nouvelles()->count(),
            'count_en_cours' => Commande::en_cours()->count(),
            'count_validees' => Commande::validees()->count(),
            'count_annulees' => Commande::annulees()->count(),
            'etats' => Etat::all(),
        ]
        )->extends('layouts.admin');
    }
}
