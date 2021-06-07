<?php

namespace App\Http\Livewire;

use App\Models\ContactMessage;
use Livewire\Component;

class ContactMessagesPage extends Component
{
    protected $listeners = [ "deleteMessage", "markMessagesAsRead" ];

    function deleteMessage($id){
        $m = ContactMessage::find($id);
        $m->delete();
        $this->emit('notify', ['message' => "Message supprimé "]);
    }

    function mount(){

    }

    function markMessagesAsRead(){
        $messages = ContactMessage::latest()->where('is_read', false)->get();
        foreach($messages as $m){
            $m->is_read = true;
            $m->save();
        }
    }

    public function render()
    {
        return view('livewire.contact-messages-page',
        [
            'messages' => ContactMessage::latest()->get(),
        ])->extends('layouts.admin');
    }
}
