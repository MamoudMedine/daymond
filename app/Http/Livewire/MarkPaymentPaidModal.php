<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Faker\Factory;
use App\Models\Cart;
use App\Models\User;
use App\Models\Client;
use App\Models\Payment;
use Livewire\Component;
use App\Models\Commande;
use App\Models\Utilisateur;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class MarkPaymentPaidModal extends Component
{
    public $displayModal = false;

    public $payment = [];
    public $paymentModel;

    public $rules = [
        'payment.montant' => "required",
        'payment.reference_paiement' => "required",
        'payment.date_paiement' => "required",
    ];

    protected $listeners = ['openMarkPaymentPaidModal', 'closeMarkPaymentPaidModal'];

    function openMarkPaymentPaidModal($id){
        $this->paymentModel = Payment::find($id);
        $this->payment = $this->paymentModel->toArray();
        $this->displayModal = true;

    }

    function closeMarkPaymentPaidModal(){
        $this->displayModal = false;
    }

    function updated($foo){
        $this->validateOnly($foo);
    }

    function markPaid(){
        if(!Auth::check()){
            return;
        }
        // dd($this->errorBag);
        $data = $this->validate();
        // dd($data);
        $data = $data['payment'];
        $data['is_paid'] = true;
        $this->paymentModel->update($data);
        $this->emit('notify', ['message' => "Paiement marqué payé !"]);
        $this->closeMarkPaymentPaidModal();
        $this->payment = [];
        return;
    }

    public function render()
    {
        if(!Auth::check()){
            return view('empty');
        }
        return view('livewire.mark-payment-paid-modal');
    }
}
