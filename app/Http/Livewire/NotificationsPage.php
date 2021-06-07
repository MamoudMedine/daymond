<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class NotificationsPage extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.notifications-page',
        [
            'notifications' => Notification::latest()->where('utilisateur_id', Auth::user()->id)->paginate(10),
        ]);
    }
}
