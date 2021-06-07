<?php

namespace App\Http\Livewire;

use Exception;
use App\Models\Etat;
use App\Models\Pays;
use App\Models\Media;
use App\Models\Produit;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use App\Models\Categorie;
use App\Models\Transaction;
use App\Models\Localisation;
use App\Models\PaysProduit;
use App\Models\SousCategorie;
use Livewire\WithFileUploads;

class ProductForm extends Component
{

    use WithFileUploads;

//    public $main_photo;
//    public $photo1;
//    public $photo2;
//    public $photo3;
    public $photos = [];

    public $sous_categories;
    public $categorie_id;

    public $produitModel;
    public $input = [];
    public $pays_ids = [];
    public $etoile = 0;
    public $page = 'create';
    protected $rules = [
//        'main_photo' => 'required|image|max:30000',
//        'photo1' => 'required|image|max:1024',
//        'photo2' => 'required|image|max:1024',
//        'photo3' => 'required|image|max:1024',
        'input.nom' => "required",
        'input.sous_titre' => "required",
        'input.description' => "required",
        'input.categorie_id' => "required",
        'input.sous_categorie_id' => "nullable",
        'input.prix' => "required",
        'input.prix_reduction' => "nullable",
        'input.commission' => "nullable",
        'input.prix_suggestion1' => "nullable",
        'input.prix_suggestion2' => "nullable",
        'input.type_cout_id' => "nullable",
        'input.etat_id' => "nullable",
        'input.transaction_id' => "nullable",
        'input.niveau_id' => "nullable",
        'input.localisation_id' => "nullable",
        'input.livraison_id' => "nullable",
        'input.visibilite_id' => "nullable",
        'pays_ids' => "required",
    ];

    protected $listeners = [
        "editProduct",
        "addEtoile"
    ];

    function addEtoile($nbre_etoile){
          $this->etoile = $nbre_etoile;
    }
    function editProduct($id){
        $produit = Produit::find($id);
        if(!$produit){
            return;
        }
        $this->produitModel = $produit;
        $this->input = $produit->toArray();
    }

    public function updatedMainPhoto()
    {
//        $this->validate([
//            'main_photo' => 'required|image|max:30000',
//        ]);
    }
    public function updatedInputCategorieId($id)
    {
        $this->categorie_id = $id;
        $this->sous_categories = SousCategorie::where('categorie_id', $id)->get();
    }
//    public function updatedPhoto1()
//    {
//        $this->validate([
//            'photo1' => 'image|max:1024',
//        ]);
//    }
//    public function updatedPhoto2()
//    {
//        $this->validate([
//            'photo2' => 'image|max:1024',
//        ]);
//    }
//    public function updatedPhoto3()
//    {
//        $this->validate([
//            'photo3' => 'image|max:1024',
//        ]);
//    }
    public function updatedPhotos()
    {
//        $this->validate([
//            'photos' => 'image|max:30000',
//        ]);
    }
    function saveProduct(){
//        dd($this->etoile);
        $data = $this->validate();
        if(request()->route('vente.create')){
            $this->validate([
                'photos' => "required|max:30000",
            ]);
        }

        if(!$this->produitModel) {
            $this->produitModel = Produit::create($data['input']);
            $this->produitModel->update(["etoile"=>$this->etoile]);
            // create countries declinations
            if($data['pays_ids']){
                $pays = Pays::whereIn('id', $data['pays_ids'])->get();
                foreach ($pays as $p) {
                    $produit_pays = PaysProduit::create([
                        'pays_id' => $p->id,
                        'produit_id' => $this->produitModel->id,
                        // 'etat_id' =>
                    ]);
                }
            }
        }else{
            $this->produitModel->update($data['input']);
            $this->produitModel->update(["etoile"=>$this->etoile]);
            if($data['pays_ids']){
                $pays = PaysProduit::where('produit_id', $this->produitModel->id)->get();
                $unselected = [];

                foreach ($pays as $p) {
                    if(!in_array($p->id, $data['pays_ids'])){
                        $p->delete();
                    }
                }
            }
        }
        $this->storePictures($this->produitModel);

        $id = $this->produitModel->id;
        $n = $this->produitModel->nom;
        $a = env('APP_URL')."/admin/products/$id";
        $this->emit('notify', ['message' => "Produit $n a été créé !", 'action' => "Voir", 'url' => "$a"]);
        $this->emit('productCreated', $this->produitModel);
        $this->emptyFields();
    }

    function emptyFields(){
        // public $produit;
        $this->photos = [];

//        $this->photo1 = null;
//
//        $this->photo2 = null;
//
//        $this->photo3 = null;

        $this->input = [];
        $this->produitModel = null;

    }

    function storePictures($produit){
        try{
            if(count($this->photos)){
                for($cpt = 0; $cpt < count($this->photos); $cpt++){
//                    $path = $this->photos[$cpt]->store('prod_img');

                    $files = $this->photos[$cpt];
                    $destinationPath = public_path('prod_img');
                    $image_name = substr(md5(uniqid()), 0, 5).date('YmdHis') . "." . $files->getClientOriginalExtension();
//                    $files->move($destinationPath, $image_name);
                    $files->storeAs('prod_img', $image_name);
//                    $url = asset($path);
                    $media = [
                        'src' => $image_name,
                        'source_id' => $produit->id,
                        'source' => 'produit',
                    ];
                    $media = Media::create($media);
                }
            }
//            if($this->photo1){
//                $path = $this->photo1->store('prod_img');
//                $url = asset($path);
//                $media = [
//                    'src' => $url,
//                    'produit_id' => $produit->id,
//                ];
//                $media = Media::create($media);
//            }
//            if($this->photo2){
//                $path = $this->photo2->store('prod_img');
//                $url = asset($path);
//                $media = [
//                    'src' => $url,
//                    'produit_id' => $produit->id,
//                ];
//                $media = Media::create($media);
//            }
//            if($this->photo3){
//                $path = $this->photo3->store('prod_img');
//                $url = asset($path);
//                $media = [
//                    'src' => $url,
//                    'produit_id' => $produit->id,
//                ];
//                $media = Media::create($media);
//            }

            // $this->validate($request, [
            //     'image' => 'required|image',
            //     ]);
            //     $files = $request->file('image');
            //     $destinationPath = public_path('storage/icon/');
            //     $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            //     $check = Media::where('type', "icon")->first();
            //     $image = strstr($check->src, '20');
            //     if(file_exists($destinationPath.$image))
            //         unlink($destinationPath.$image);
            //     $files->move($destinationPath, $profileImage);
            //     $check->updateOrCreate(
            //         ['type' => 'icon'],
            //         ['src' => env('APP_URL') . "/public/storage/icon/$profileImage"],
            //     );
        } catch(Exception $e){
            return false;
        }
        return true;
    }

    function mount($id = null){
        if($id){
            $produit = Produit::find($id);
            if($produit){
                $this->page = 'update';
                $this->produitModel = $produit;
                $this->input = $produit->toArray();
                if($produit->etoile ==1){
                    $this->etoile = 1;
                }else{
                    $this->etoile = 0;
                }
            }
        }
        $this->sous_categories = SousCategorie::all();

    }

    public function render()
    {
        $categories = Categorie::all();
        $etats = Etat::all();
        $localisations = Localisation::all();
        $transactions = Transaction::all();
        $pays = Pays::all();

        return view('livewire.product-form', [
            'categories' => $categories,
            'etats' => $etats,
            'localisations' => $localisations,
            'transactions' => $transactions,
            'pays' => $pays
        ])->extends('layouts.admin');
    }
}
