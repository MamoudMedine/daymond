<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Notification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class NotificationForm extends Component
{
    public $admins;
    public $utilisateurs;
    public $user_search = "";
    public $notificationModel;

    public $notification = [];
    protected $rules = [
        'notification.texte' => "required",
        'notification.utilisateur_id' => "required",
        'notification.admin_id' => "",
    ];

    function saveNotification(){

        // $id = 1;
        // $n = "Bon bon dou";
        // $a = env('APP_URL')."/admin/products/$id";
        // $this->emit('notify', ['message' => "Produit $n a été créé !", 'action' => "Voir", 'url' => $a, 'time' => 10]);
        // return;

        $data = $this->validate();
        $data['notification']['admin_id'] = Auth::user()->id;
        $data = $data['notification'];
        // dd($data);
        if(!$this->notificationModel){
            $this->notificationModel = Notification::create($data);
        }
        $this->notificationModel->update($data);
        $a = env('APP_URL')."/admin/notifications";
        $this->emit('notify', ['message' => "Notification enregistrée !", 'action' => "Voir", 'url' => "$a"]);
        $this->emptyFields();
    }

    function emptyFields(){
        $this->notificationModel = null;
        $this->notification = [];
    }

    function selectUser($id){
        $this->notification['utilisateur_id'] = $id;
    }

    function mount($id = null){
        if($id){
            $this->notificationModel = Notification::find($id);
            $this->notification = $this->notificationModel->toArray();
        }
        $this->utilisateurs = User::utilisateurs()->get();
    }

    public function render()
    {

        return view('livewire.notification-form', [
        ])->extends('layouts.admin');
    }
}
