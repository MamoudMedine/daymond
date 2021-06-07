<?php

namespace App\Http\Livewire\Admin;

use App\Models\Etat;
use Livewire\Component;
use App\Models\Notification;
use App\Models\User;
use Livewire\WithPagination;

class NotificationsPage extends Component
{
    public $search = "";
    public $etat_id;
    public $utilisateur_id;
    public $count = 10;
    use WithPagination;

    function deleteNotification($id){
        $notification = Notification::find($id);
        $n = $notification->id;
        $notification->delete();
        // $a = env('APP_URL')."/admin/products/$id";
        $this->emit('notify', ['message' => "Notification #$n supprimée !"]);
        // $this->emit('productCreated', $produit);
    }

    public function render()
    {
        return view('livewire.admin.notifications-page',
        [
            'notifications' => Notification::latest()->where('texte', 'like', '%'.$this->search.'%')
                ->when($this->etat_id, function($query) {
                    return $query->where('etat_id', $this->etat_id);
                })
                ->when($this->utilisateur_id, function($query) {
                    return $query->where('utilisateur_id', $this->utilisateur_id);
                })
                ->paginate($this->count),
            'etats' => Etat::all(),
            'utilisateurs' => User::where('is_admin', false)->get(),
        ])->extends('layouts.admin');
    }
}
