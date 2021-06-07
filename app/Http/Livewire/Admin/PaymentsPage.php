<?php

namespace App\Http\Livewire\Admin;

use App\Models\Payment;
use Livewire\Component;

class PaymentsPage extends Component
{

    function markPaid($id){
        if(!$id){
            return;
        }
        // $payment = Payment::find($id);
        $this->emit('openMarkPaymentPaidModal', $id);
    }
    public function render()
    {
        return view('livewire.admin.payments-page', [
            'payments' => Payment::all(),
        ])->extends('layouts.admin');
    }
}
