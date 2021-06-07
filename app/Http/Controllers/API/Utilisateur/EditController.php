<?php

namespace App\Http\Controllers\Api\Utilisateur;

use App\Http\Controllers\Controller;
use App\Models\Adresse;
use App\Models\Media;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Utilisateur\UpdateAccountRequest;
use Illuminate\Support\Str;
use App\Repositories\API\UtilisateurRepository;
use App\Http\Controllers\AppBaseController;

class EditController extends AppBaseController
{
    private $utilisateurRepository;

    public function _construct(UtilisateurRepository $userRepo)
    {
        $this->utilisateurRepository = $userRepo;
    }

    // Get user data
    public function userProfile(Request $request)
    {
        $utilisateur = Utilisateur::where('contact', auth()->user()->contact)->first();
        if(!empty($utilisateur)){
            if(!empty($utilisateur->adresse->pays)) {
                $day = substr(substr($utilisateur->created_at, 0, 10), 8, 2);
                $month = substr(substr($utilisateur->created_at, 0, 10), 5, 2);
                $year = substr(substr($utilisateur->created_at, 0, 10), 0, 4);
                $user['id'] = $utilisateur->id;
                $user['nom'] = $utilisateur->nom;
                $user['pays'] = $utilisateur->adresse->pays;
                $user['ville'] = $utilisateur->adresse->ville;
                $user['photo'] = $utilisateur->photo;
                $user['profession'] = $utilisateur->profession;
                $user['contact'] = $utilisateur->contact;
                $user['adresse_id'] = $utilisateur->adresse_id;
                $user['dateInscription'] = "$day/$month/$year";
                $user['heureInscription'] = substr($utilisateur->created_at, 11, 5);
                return $this->sendResponse($user, 'Information sur l\'abonné !');
            }
            else {
                $day = substr(substr($utilisateur->created_at, 0, 10), 8, 2);
                $month = substr(substr($utilisateur->created_at, 0, 10), 5, 2);
                $year = substr(substr($utilisateur->created_at, 0, 10), 0, 4);
                $user['id'] = $utilisateur->id;
                $user['nom'] = $utilisateur->nom;
                $user['photo'] = $utilisateur->photo;
                $user['profession'] = $utilisateur->profession;
                $user['contact'] = $utilisateur->contact;
                $user['adresse_id'] = $utilisateur->adresse_id;
                $user['dateInscription'] = "$day/$month/$year";
                $user['heureInscription'] = substr($utilisateur->created_at, 11, 5);
                return $this->sendResponse($user, 'Information sur l\'abonné !');
            }
        }
        else {
            return $this->sendError('Aucun utilisateur connecté !');
        }
    }

    // Update user data
    public function updateAccount(Request $request)
    {
        $data = $request->all();

        if(!empty($data['photo'])) {
            $validator = Validator::make($data, [
                    'photo' => 'required|max:2048',
                    'nom' => 'required|string',
                    'pays' => 'required|string',
                    'ville' => 'required|string',
                    'profession' => 'required|string',
                    'contact' => 'required|unique:utilisateurs',
                ], 
                [
                    'nom.required'=>'le nom est obligatoire svp',
                    'nom.string'=>'le nom doit etre une chaine de caractere svp',
                    'pays.required'=>'le pays est obligatoire svp',
                    'pays.string'=>'le pays doit etre une chaine de caractere svp',
                    'ville.required'=>'la ville est obligatoire svp',
                    'ville.string'=>'la ville doit etre une chaine de caractere svp',
                    'contact.required'=>'le contact est obligatoire svp',
                    'contact.unique'=>'Desolé, ce contact existe déja',
                ]
            );

            if($validator->fails())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
            else
                $adresse = Adresse::find($data['id_adresse']);
                $adresse->update([
                    'pays'=>$data['pays'],
                    'ville'=>$data['ville'],
                ]);
                $utilisateur = Utilisateur::where('contact', auth()->user()->contact)->first();
                $utilisateur->update([
                    'nom' => $data['nom'],
                    'profession' => $data['profession'],
                    'contact' => $data['contact'],
                    'photo' => $data['photo']
                ]);
                if($utilisateur)
                    // $photo_name = 'profile_'.date('dmYHis').$request->file('photo')->getClientOriginalExtension();
                    // $data['photo']->move(public_path('uploads/profiles/'), $data['photo']);
                    if ($request->hasFile('photo'))
                        $destinationPath = public_path('uploads/profiles/');
                        $files = $request->file('photo');
                        $file_name = $file->getClientOriginalName();
                        $file->move($destinationPath , $file_name);
                    return response()->json(['success'=>true, 'utilisateur'=>$utilisateur]);
        }
        else {
            $validator = Validator::make($data, [
                    'nom' => 'required|string',
                    'pays' => 'required|string',
                    'ville' => 'required|string',
                    'profession' => 'required|string',
                    'contact' => 'required|unique:utilisateurs',
                ], 
                [
                    'nom.required'=>'le nom est obligatoire svp',
                    'nom.string'=>'le nom doit etre une chaine de caractere svp',
                    'pays.required'=>'le pays est obligatoire svp',
                    'pays.string'=>'le pays doit etre une chaine de caractere svp',
                    'ville.required'=>'la ville est obligatoire svp',
                    'ville.string'=>'la ville doit etre une chaine de caractere svp',
                    'contact.required'=>'le contact est obligatoire svp',
                    'contact.unique'=>'Desolé, ce contact existe déja',
                ]
            );

            if($validator->fails())
                return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
            else
                $adresse = Adresse::findOrFail($data['id_adresse']);
                $adresse->update([
                    'pays'=>$data['pays'],
                    'ville'=>$data['ville'],
                ]);
                $utilisateur = Utilisateur::where('contact', auth()->user()->contact)->first();
                $utilisateur->update([
                    'nom' => $data['nom'],
                    'profession' => $data['profession'],
                    'contact' => $data['contact']
                ]);
                if($utilisateur)
                    return response()->json(['success'=>true, 'utilisateur'=>$utilisateur]);
        }
    }
}
