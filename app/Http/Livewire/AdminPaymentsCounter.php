<?php

namespace App\Http\Livewire;

use App\Models\Payment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AdminPaymentsCounter extends Component
{
    public $total = 0;

    protected $listeners = [
        'commandeValidee' => '$refresh',
        'paymentCreated' => '$refresh',
    ];

    public function mount()
    {
        if(Auth::check()){
            if(Auth::user()->is_admin){
                $this->total = Payment::where('is_paid', false)->orWhere('is_paid', null)->count();
            }
        }
    }

    public function render()
    {
        return view('livewire.admin-payments-counter');
    }
}
