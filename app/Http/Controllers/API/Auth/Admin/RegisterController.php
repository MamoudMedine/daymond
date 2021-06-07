<?php

namespace App\Http\Controllers\Api\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Adresse;
use App\Models\Utilisateur;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * CREATION ADMIN
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function create(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'nom'=>['required', 'string'],
                'prenom'=>['required', 'string'],
                'password'=>['required', 'min:8'],
                'contact'=>['required', 'unique:utilisateurs', 'digits:10', 'min:8', 'max:15'],
            ], [
                'nom.required'=>'le nom est obligatoire svp',
                'nom.string'=>'le nom doit etre une chaine de caractere svp',
                'prenom.required'=>'le prenom est obligatoire svp',
                'prenom.string'=>'le prenom doit etre une chaine de caractere svp',
                'contact.required'=>'le contact est obligatoire svp',
                'contact.unique'=>'Desolé, ce contact existe déja',
                'contact.digits'=>'le contact doit etre uniquement des chiffres svp',
                'contact.min'=>'le contact doit etre de 8 chiffres au moins',
                'contact.max'=>'le contact doit etre de 15 chiffres au plus',
                'password.required'=>'le mot de passe est obligatoire svp',
                'password.min'=>'Mot de passe trop court(au moins 8 caracteres)',
            ]
        );
        if($validator->fails()){
            return response()->json(['errors'=>$validator->getMessageBag()->toArray()]);
        }
        try {
             $admin = Admin::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'contact' => $request->indicatif.$request->contact,
                'password' => Hash::make($request->password),
             ]);

            return response()->json(['success'=>true, 'admin'=>$admin]);
        }catch(\Exception $e){
            return response()->json(['success'=>false]);
        }
    }

}
