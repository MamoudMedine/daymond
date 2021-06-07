<?php

namespace App\Http\Livewire\Admin;

use App\Models\Media;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProduitManage extends Component
{
    use WithFileUploads;

    public $image;
    public $currentImageId;
    protected $listeners = ["getImageId"];

    function getImageId($imageId){
        $this->currentImageId = $imageId;
    }

    public function updateImage()
    {
        $media = Media::find($this->currentImageId);
        File::delete(public_path('prod_img/'.$media->src));
        $file = $this->image;
        $destinationPath = public_path('prod_img');
        $image_name = date('YmdHis') . "." . $file->getClientOriginalExtension();
        $file->storeAs('prod_img', $image_name);
        $media->update (
            [
                'src' => $image_name,
            ]
        );
        $this->emit('notify', ['message' => "Image modifiée avec succès !"]);
        $this->emit('imageUpdated');
//        return redirect()->route('products');
        // Upload img to database
//        dd($this->currentImageId);
//        dd($this->image);
    }

    public function render()
    {
        return view('livewire.admin.produit-manage');
    }
}
