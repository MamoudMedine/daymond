<?php

namespace App\Http\Livewire;

use App\Models\Media;
use App\Models\Produit;
use Livewire\Component;

class ProductImages extends Component
{
    public $media;
    public $main;

    public function display($src){
        $this->main = $src;
    }

    public function mount($prodId)
    {
        $this->product = Produit::find($prodId);
        $images = Media::whereSource('produit')->where('source_id', $prodId)->get();
        if($images){
            $first_img = $images;
            $this->media = $first_img->splice(1);
            $first = $first_img->first();
            if($first){
                $this->main = $first->src;
            }
        }
    }

    public function render()
    {
        return view('livewire.product-images');
    }
}
