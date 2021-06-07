<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use App\Repositories\API\DiffusionRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Models\User;
use App\Models\Utilisateur;
use App\Models\TypeDiffusion;
use App\Models\Media;
use App\Models\Produit;
use Illuminate\Support\Facades\Validator;

class DiffusionController extends AppBaseController
{
    private $diff;
    
    /**
     * __construct
     *
     * @param  mixed $diffusion
     * @return void
     */
    public function __construct(DiffusionRepository $diffusion)
    {
        $this->diff = $diffusion;
    }

    /**
     * @param $utilisateur_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDiffusions()
    {
       try {
            $diffusions = $this->diff->latest()->get();
            $collection = new Collection([]);
            foreach($diffusions as $diffusion) {
                if(!empty($diffusion->produit->media)) {
                    $data = [
                        'diffusion' => $diffusion,
                        'admin' => $diffusion->admin,
                        'utilisateur' => $diffusion->utilisateur,
                        'produit' => $diffusion->produit,
                        'media' => $diffusion->produit->media,
                        'file' => $diffusion->media,
                    ];
                    $collection->push($data);
                }
                else {
                    $data = [
                        'diffusion' => $diffusion,
                        'admin' => $diffusion->admin,
                        'utilisateur' => $diffusion->utilisateur,
                        'produit' => $diffusion->produit,
                        'media' => [],
                        'file' => $diffusion->media,
                    ];
                    $collection->push($data);
                }
            }
            return $this->sendResponse($collection, 'Liste des diffusions');
            
        }catch(\Exception $e){
            return $this->sendError("Erreur de récupération des diffusions $e");
        }
    }

    public function createDiffusion(Request $request)
    {
        $data = $request->all();
        if(!empty($data['file'])) {
            $validator = Validator::make($data, [
                'file' => 'required|max:1048576',
            ], [
                'file.required' => 'Le fichier doit être séléctionné',
                'file.max' => 'La taille du fichier ne doit pas dépasser 1Gb',
            ]);
            if($validator->fails())
                return $this->sendError($validator->errors());
            $admin = User::where('name', $data['admin'])->first();
            $user = Utilisateur::where('nom', $data['user'])->first();
            $typeDiff = TypeDiffusion::where('nom', $data['type_diff'])->first();
            $prod = Produit::where('nom', $data['product_name'])->first();
            $files = $request->file('file');
            $destinationPath = public_path('storage/diffusion/');
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $insert = $this->diff->create([
                'texte' => $data['texte'],
                'date_vente' => $data['date'],
                'disponibilite' => $data['disponibilite'],
                'admin_id' => $admin->id,
                'utilisateur_id' => $user->id,
                'produit_id' => $prod->id,
                'type_diffusion_id' => $typeDiff->id,
            ]); 
            Media::create([
                'src' => env('APP_URL') . "/public/storage/diffusion/$profileImage",
                'source_id' => $insert->id,
                'source' => 'diffusion'
            ]);
        }
        else {
            $admin = User::where('name', $data['admin'])->first();
            $user = Utilisateur::where('nom', $data['user'])->first();
            $typeDiff = TypeDiffusion::where('nom', $data['type_diff'])->first();
            $prod = Produit::where('nom', $data['product_name'])->first();
            $insert = $this->diff->create([
                'texte' => $data['texte'],
                'date_vente' => $data['date'],
                'disponibilite' => $data['disponibilite'],
                'admin_id' => $admin->id,
                'utilisateur_id' => $user->id,
                'produit_id' => $prod->id,
                'type_diffusion_id' => $typeDiff->id,
            ]);  
        }

        if($insert)
            return $this->sendSuccess('Diffusion crée !');
        else
            return $this->sendError('Erreur de création de la diffusion');
    }

    
    public function delDiffusion(Request $request)
    {
        $diffusion = $this->diff->delete($request->diffusion_id);
        return $this->sendSuccess('Diffusion supprimé');
    }

    public function updateDiffusion(Request $request)
    {
        $data = $request->all();
        if(!empty($data['file'])) {
            $validator = Validator::make($data, [
                'file' => 'required|max:1048576',
            ], [
                'file.required' => 'Le fichier doit être séléctionné',
                'file.max' => 'La taille du fichier ne doit pas dépasser 1Gb',
            ]);
            if($validator->fails())
                return $this->sendError($validator->errors());
            $admin = User::where('name', $data['admin'])->first();
            $user = Utilisateur::where('nom', $data['user'])->first();
            $typeDiff = TypeDiffusion::where('nom', $data['type_diff'])->first();
            $prod = Produit::where('nom', $data['product_name'])->first();
            $files = $request->file('file');
            $destinationPath = public_path('storage/diffusion/');
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $diffusionId = $this->diff->latest()->where('id', $data['diffusion_id'])->first();
            $insert = $diffusionId->update([
                'texte' => $data['texte'],
                'date_vente' => $data['date'],
                'disponibilite' => $data['disponibilite'],
                'admin_id' => $admin->id,
                'utilisateur_id' => $user->id,
                'produit_id' => $prod->id,
                'type_diffusion_id' => $typeDiff->id,
            ]); 
            $updated = Media::where('source_id', $diffusionId->id)->first();
            $updated->update([
                'src' => env('APP_URL') . "/public/storage/diffusion/$profileImage",
                'source_id' => $insert->id,
                'source' => 'diffusion'
            ]);
        }
        else {
            $admin = User::where('name', $data['admin'])->first();
            $user = Utilisateur::where('nom', $data['user'])->first();
            $typeDiff = TypeDiffusion::where('nom', $data['type_diff'])->first();
            $prod = Produit::where('nom', $data['product_name'])->first();
            $diffusionId = $this->diff->latest()->where('id', $data['diffusion_id'])->first();
            $insert = $diffusionId->update([
                'texte' => $data['texte'],
                'date_vente' => $data['date'],
                'disponibilite' => $data['disponibilite'],
                'admin_id' => $admin->id,
                'utilisateur_id' => $user->id,
                'produit_id' => $prod->id,
                'type_diffusion_id' => $typeDiff->id,
            ]);  
        }

        if($insert)
            return $this->sendSuccess('Diffusion crée !');
        else
            return $this->sendError('Erreur de création de la diffusion');
    }
}
