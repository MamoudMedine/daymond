<?php

namespace App\Http\Controllers\Api\Auth\Utilisateur;

use App\Http\Controllers\Controller;
use App\Models\Utilisateur;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Repositories\API\UtilisateurRepository;
use App\Http\Controllers\AppBaseController;

class LoginController extends AppBaseController
{
    /** @var  Utilisateur\UtilisateurRepository */
    private $utilisateur;

    public function __construct(UtilisateurRepository $user)
    {
        $this->utilisateur = $user;
    }

    public function login(Request $request)
    {
        $contact = substr($request->contact, 1, 13);
        $utilisateur = $this->utilisateur->latest()->where('contact', $contact)->first();
        if($utilisateur){
            if(!empty($utilisateur->adresse->pays)) {
                $day = substr(substr($utilisateur->created_at, 0, 10), 8, 2);
                $month = substr(substr($utilisateur->created_at, 0, 10), 5, 2);
                $year = substr(substr($utilisateur->created_at, 0, 10), 0, 4);
                $success['token'] =  $utilisateur->createToken('MyApp', ['utilisateur'])->accessToken;
                $success['id'] =  $utilisateur->id;
                $success['nom'] =  $utilisateur->nom;
                $success['pays'] =  $utilisateur->adresse->pays;
                $success['ville'] =  $utilisateur->adresse->ville;
                $success['profession'] =  $utilisateur->profession;
                $success['contact'] =  $utilisateur->contact;
                $success['photo'] =  $utilisateur->photo;
                $success['dateInscription'] = "$day/$month/$year";
                $success['heureInscription'] = substr($utilisateur->created_at, 11, 5);

                // ENVOI DE SMS
                $code  = strtoupper(substr(md5(uniqid()), 0, 5));
                $nom = $success['nom'];
                $extract = substr($request->contact, 2, 8);
                $numero = intval($extract);
                $message = "Bonjour $nom, veuillez utiliser le code suivant pour vous authentifié. Code : $code";
                $response = Http::get("https://admin.sms-mail.pro/sms/api?action=send-sms&api_key=ZGF5bW9uZDoxNDdkYXltb25k&to=$numero&from=DAYMOND&sms=$message");
                $response->body();

                $utilisateur->update(['password'=>$code]);
            }
            else {
                $day = substr(substr($utilisateur->created_at, 0, 10), 8, 2);
                $month = substr(substr($utilisateur->created_at, 0, 10), 5, 2);
                $year = substr(substr($utilisateur->created_at, 0, 10), 0, 4);
                $success['token'] =  $utilisateur->createToken('MyApp', ['utilisateur'])->accessToken;
                $success['id'] =  $utilisateur->id;
                $success['nom'] =  $utilisateur->nom;
                // $success['pays'] =  $utilisateur->adresse->pays;
                // $success['ville'] =  $utilisateur->adresse->ville;
                $success['profession'] =  $utilisateur->profession;
                $success['contact'] =  $utilisateur->contact;
                $success['photo'] =  $utilisateur->photo;
                $success['dateInscription'] = "$day/$month/$year";
                $success['heureInscription'] = substr($utilisateur->created_at, 11, 5);

                // ENVOI DE SMS
                $code  = strtoupper(substr(md5(uniqid()), 0, 5));
                $nom = $success['nom'];
                $extract = substr($request->contact, 2, 8);
                $numero = intval($extract);
                $message = "Bonjour $nom, veuillez utiliser le code suivant pour vous authentifié. Code : $code";
                $response = Http::get("https://admin.sms-mail.pro/sms/api?action=send-sms&api_key=ZGF5bW9uZDoxNDdkYXltb25k&to=$numero&from=DAYMOND&sms=$message");
                $response->body();

                $utilisateur->update(['password'=>$code]);
            }
            return $this->sendResponse($success, 'Connexion réussi !');
        }
        else {
            return $this->sendError('Les coordonnées ne sont pas valide !');
        }
    }
}
