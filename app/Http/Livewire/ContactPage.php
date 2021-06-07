<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ContactPage extends Component
{
    public $showContactForm = false;

    function showContactForm(){
        $this->showContactForm = !$this->showContactForm;
    }
    public function render()
    {
        return view('livewire.contact-page');
    }
}
