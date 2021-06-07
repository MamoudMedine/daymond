<?php

namespace App\Http\Livewire\Admin;

use App\Models\Media;
use Livewire\Component;
use Livewire\WithFileUploads;

class Slideshow extends Component
{
    public $logo;
    public $current_logo;

    public $photo;
    use WithFileUploads;

    function updatedLogo(){
        $this->validate(['logo' => "file|image"]);
        $this->store();
    }
    function updatedPhoto(){
        $this->validate(['photo' => "file|image"]);
        $this->store();
    }

    function removePhoto($id){
        $m = Media::find($id);
        if(!$m){
            return;
        }
        $m->delete();
    }

    function store(){
        if($this->photo){
            $path = $this->photo->store('prod_img');
            $url = asset($path);
            $media = [
                'src' => $url,
                'source' => "slideshow"
            ];
            $media = Media::create($media);
            $this->photo = null;
        }
        if($this->logo){
            $old_logos = Media::where('source', 'logo')->get();

            foreach ($old_logos as $old) {
                $old->delete();
            }
            $path = $this->logo->store('prod_img');
            $url = asset($path);
            $logo = [
                'src' => $url,
                'source' => "logo"
            ];
            $this->current_logo = Media::create($logo);
            $this->logo = null;
        }
    }

    function mount(){
        $this->current_logo = Media::where('source', 'logo')->first();
    }

    public function render()
    {
        return view('livewire.admin.slideshow', [
            'media' => Media::where('source', 'slideshow')->get(),
            'logo' => Media::where('source', 'logo')->first(),
        ])->extends('layouts.admin');
    }
}
