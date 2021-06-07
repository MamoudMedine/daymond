<?php

namespace App\Http\Livewire;

use App\Models\Diffusion;
use Livewire\Component;

class DiffusionsPage extends Component
{

    public function render()
    {
        $diffusions = Diffusion::latest()->where('date_vente', '<=', today())->paginate(10);
        return view('livewire.diffusions-page',
        [
            'diffusions' => $diffusions,
        ]);
    }
}
