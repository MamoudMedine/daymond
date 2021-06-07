<?php

namespace App\Http\Livewire\Admin;

use App\Models\Adresse;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminProfilePage extends Component
{
    use WithFileUploads;

    public $user;
    public $profile;
    public $prenom;
    public $nom;
    public $profession;
    public $contact;
    public $country;
    public $city;
    public $photo;

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'image|max:1024', // 1MB Max
        ]);
    }

    public function save()
    {
        $input = $this->validate([
            'prenom' => '',
            'nom' => '',
            'profession' => '',
            'contact' => 'nullable|min:10|max:15',
        ]);


        if($this->photo){
//            $path = $this->photo->store('pp');
            $photo_name = Auth::user()->id.date('YmdHis') . "." . $this->photo->getClientOriginalExtension();
            $path = $this->photo->storeAs('storage/users', $photo_name);
//            $url = asset('public/'.$path);
            $this->profile->photo = $photo_name;
            $this->profile->save();
        }

        $this->profile->update($input);


        if($this->country || $this->city){

            $data = [
                'pays' => $this->country,
                'ville' => $this->city,
            ];
            $address = $this->profile->adresse;

            if(!$address){
                $address = Adresse::create($data);
            }
            $address->update($data);
            $this->profile->adresse_id = $address->id;
            $this->profile->save();
            $this->emit('notify', ['message' => "Adresse mise à jour"]);
        }
        $this->emit('notify', ['message' => "Profil enregistré"]);

    }

    function mount(){
        if(!Auth::check()){
            return;
        }
        $u = Auth::user();

        $p = $u->utilisateur;
        if(!$p) {
            $p = Utilisateur::create([
                'user_id' => $u->id,
            ]);
        }
        $country = null;
        $city = null;
        if($p->adresse){
            $country = $p->adresse->pays;
            $city = $p->adresse->ville;
        }
        $this->user = $u;
        $this->profile = $p;
        $this->nom =  $p->nom;
        $this->prenom =  $p->prenom;
        $this->profession = $p->profession;
        $this->contact = $p->contact;
        $this->country = $country;
        $this->city = $city;

    }
    public function render()
    {
        return view('livewire.admin.admin-profile-page')->layout('layouts.admin');
    }
}
