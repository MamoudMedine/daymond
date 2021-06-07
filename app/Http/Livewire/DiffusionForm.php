<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Produit;
use Livewire\Component;
use App\Models\Diffusion;
use App\Models\Media;
use App\Models\TypeDiffusion;
use Livewire\WithFileUploads;

class DiffusionForm extends Component
{
    use WithFileUploads;
    public $admins;
    public $diffusionModel;
    public $file;
    public $type;
    public $accepted_files;
    public $diffusion = [];
    protected $rules = [
        'diffusion.texte' => "required",
        'diffusion.disponibilite' => "",
        'diffusion.date_vente' => "",
        'diffusion.type_diffusion_id' => "required",
        'diffusion.produit_id' => "nullable",
        'diffusion.admin_id' => "required",
    ];

    function updatedType($type){
        $this->accepted_files = null;
        switch ($type) {
            case 'image':
                $this->accepted_files = "image/x-png,image/jpeg";
                break;
            case 'video':
                $this->accepted_files = "video/*";
                break;
            case 'audio':
                $this->accepted_files = "audio/*";
                break;
            default:
                break;
        }
    }

    function updatedFile($file){
        $this->validate(['file' => "file|max:30000"]);
    }

    function saveDiffusion(){

        // $id = 1;
        // $n = "Bon bon dou";
        // $a = env('APP_URL')."/admin/products/$id";
        // $this->emit('notify', ['message' => "Produit $n a été créé !", 'action' => "Voir", 'url' => $a, 'time' => 10]);
        // return;

        $data = $this->validate();

        $data = $data['diffusion'];
        $media = [];
        if($this->file){
            if(!$this->type){
                $this->addError('type', "Veuillez sélectionner le type de fichier");
            }
            if($this->file){
                $path = $this->file->store('pp');
                $url = asset($path);
                $media = [
                    'src' => $url,
                    'source' => 'diffusion',
                    'type' => $this->type,
                ];
            }
        }
        if(!$this->diffusionModel){
            $this->diffusionModel = Diffusion::create($data);
        }

        $media['source_id'] = $this->diffusionModel->id;

        $this->diffusionModel->update($data);

        Media::create($media);

        // $id = $diffusion->id;
        // $n = $diffusion->nom;
        $a = env('APP_URL')."/admin/diffusion";
        $this->emit('notify', ['message' => "Diffusion enregistrée !", 'action' => "Voir", 'url' => "$a"]);
        $this->emptyFields();
    }

    function emptyFields(){
        $this->diffusionModel = null;
        $this->file = null;
        $this->type = null;
        $this->diffusion = [];
    }
    function mount($id = null){
        if($id){
            $this->diffusionModel = Diffusion::find($id);
            $this->diffusion = $this->diffusionModel->toArray();
        }
        $this->admins = User::admins()->get();
    }

    public function render()
    {

        return view('livewire.diffusion-form', [
            'type_diffusions' => TypeDiffusion::all(),
            'produits' => Produit::all(),
        ])->extends('layouts.admin');
    }
}
