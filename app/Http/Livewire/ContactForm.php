<?php

namespace App\Http\Livewire;

use App\Models\ContactMessage;
use Livewire\Component;

class ContactForm extends Component
{
    public $message_sent = false;
    public $contact = [];
    protected $rules = [
        'contact.nom' => "required",
        'contact.email' => "required|email",
        'contact.contact' => "required",
        'contact.objet' => "required",
        'contact.contenu' => "required|min:10",
    ];
    function updated($field){
        $this->validateOnly($field);
    }
    function save(){
        $data = $this->validate();
        $data = $data['contact'];

        $contact_message = ContactMessage::create($data);

        // send via mail

        $this->emit('notify', ['message' => "Votre message a bien été envoyé !"]);

        $this->message_sent = true;
        $this->contact = [];
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
