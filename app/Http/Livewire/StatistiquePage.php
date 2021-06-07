<?php

namespace App\Http\Livewire;

use App\Models\Cart;
use App\Models\Commande;
use Livewire\Component;

class StatistiquePage extends Component
{
    public function render()
    {

        return view('livewire.statistique-page', [
            'saw' => 24,
            'downloaded' => 13,
            'copied' => 16,
            'carts' => Cart::count(),
            'ordered' => Commande::count(),
        ])->extends('layouts.admin');
    }
}
