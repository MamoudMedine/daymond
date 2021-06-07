<?php

namespace App\Http\Livewire\Admin;

use App\Models\Diffusion;
use App\Models\TypeDiffusion;
use Livewire\Component;
use Livewire\WithPagination;

class DiffusionsPage extends Component
{
    public $search = "";
    public $type_diffusion_id;
    public $count = 10;
    use WithPagination;

    function deletDiffusion($id){
        $diffusion = Diffusion::find($id);
        $n = $diffusion->id;
        $diffusion->delete();
        // $a = env('APP_URL')."/admin/products/$id";
        $this->emit('notify', ['message' => "Diffusion #$n supprimée !"]);
        // $this->emit('productCreated', $produit);
    }

    public function render()
    {
        return view('livewire.admin.diffusions-page',
        [
            'diffusions' => Diffusion::latest()->where('texte', 'like', '%'.$this->search.'%')
                ->when($this->type_diffusion_id, function($query) {
                    return $query->where('type_diffusion_id', $this->type_diffusion_id);
                })
                // ->when($this->transaction_id, function($query) {
                //     return $query->where('transaction_id', $this->transaction_id);
                // })
                // ->when($this->etat_id, function($query) {
                //     return $query->where('etat_id', $this->etat_id);
                // })
                ->paginate($this->count),
            'type_diffusions' => TypeDiffusion::all(),
        ])->extends('layouts.admin');
    }
}
