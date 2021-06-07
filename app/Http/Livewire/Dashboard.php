<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;
use App\Models\Commande;
use App\Models\ContactMessage;

class Dashboard extends Component
{
    public function render()
    {
        $orders_count = Commande::lancees()->count();
        $messages_count = ContactMessage::where('is_read', false)->count();
        $payments_count = Payment::where('is_paid', false)->orWhere('is_paid', null)->count();
        return view('livewire.dashboard', compact('orders_count', 'messages_count', 'payments_count'))->extends('layouts.admin');
    }
}
