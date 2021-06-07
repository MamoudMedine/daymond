<?php

namespace App\Http\Controllers\Api\Auth\Utilisateur;

use App\Http\Controllers\Controller;
use App\Models\Adresse;
use App\Models\Utilisateur;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use App\Repositories\API\UtilisateurRepository;
use App\Http\Controllers\AppBaseController;

class RegisterController extends AppBaseController
{
    /** @var  Utilisateur\UtilisateurRepository */
    private $utilisateur;

    public function __construct(UtilisateurRepository $user)
    {
        $this->utilisateur = $user;
    }

    // CREATION UTILISATEUR
    protected function create(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'nom'=>['required', 'string'],
                'prenom'=>['required', 'string'],
                'pays'=>['required', 'string'],
                'ville'=>['required', 'string'],
                'profession'=>['required', 'string'],
                'contact'=>['required', 'unique:utilisateurs'],
            ], [
                'nom.required'=>'le nom est obligatoire svp',
                'nom.string'=>'le nom doit etre une chaine de caractere svp',
                'prenom.required'=>'le prenom est obligatoire svp',
                'prenom.string'=>'le prenom doit etre une chaine de caractere svp',
                'pays.required'=>'le pays est obligatoire svp',
                'pays.string'=>'le pays doit etre une chaine de caractere svp',
                'ville.required'=>'la ville est obligatoire svp',
                'ville.string'=>'la ville doit etre une chaine de caractere svp',
                'contact.required'=>'le contact est obligatoire svp',
                'contact.unique'=>'Desolé, ce contact existe déja',
            ]
        );

        if($validator->fails()){
            return response()->json([
                'error' => $validator->getMessageBag()->toArray(),
                'message' => 'Le contact existe déjà !', 
            ]);
        }
        else {
            $code  = strtoupper(substr(md5(uniqid()), 0, 5));
            $contact = substr($request->contact, 1, 13);

            // ENVOI DE SMS
            $nom = $request->nom;
            $extract = substr($request->contact, 2, 8);
            $numero = intval($extract);
            $message = "Bonjour $nom, veuillez utiliser le code suivant pour confirmer votre compte daymond. Code : $code";

            $response = Http::get("https://admin.sms-mail.pro/sms/api?action=send-sms&api_key=ZGF5bW9uZDoxNDdkYXltb25k&to=$numero&from=DAYMOND&sms=$message");
            $response->body();

            $adresse = Adresse::create([
                'pays'=>$request->pays,
                'ville'=>$request->ville,
            ]);
            $utilisateur = Utilisateur::create([
                'nom'=>$request->nom,
                'prenom'=>$request->prenom,
                'profession'=>$request->profession,
                'contact'=>$contact,
                'password'=>$code,
                'adresse_id'=>$adresse->id,
            ]);

            $success['token'] =  $utilisateur->createToken('MyApp')->accessToken;
            $success['id'] =  $utilisateur->id;
            $utilisateur->save();

            return response()->json(['success'=>true, 'utilisateur'=>$success]);
        }
    }

    // CONFIRMATION DU NUMERO DE TELEPHONE
    protected function confirmation(Request $request)
    {
        $utilisateur = $this->utilisateur->latest()->where('id', $request->id)->where('password', $request->code)->first();
        if($utilisateur){
            $utilisateur->update([
                'password'=>'user_account_confirmed'
            ]);
            return $this->sendSuccess('Compte confirmé');
        }
        else {
            return $this->sendError("Le code n'est pas valide !");
        }
    }

}
