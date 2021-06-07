<?php

namespace App\Http\Livewire;

use App\Models\Utilisateur;
use Livewire\Component;

class AdminUsersPage extends Component
{
    public function render()
    {
        return view('livewire.admin-users-page',
        [
            "users"=>Utilisateur::latest()->paginate(12)
        ]
        )->layout('layouts.admin');
    }
}
