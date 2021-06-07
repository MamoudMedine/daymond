<?php

namespace App\Http\Controllers\Api\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Utilisateur;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use App\Repositories\API\UsersRepository;
use App\Http\Controllers\AppBaseController;

class LoginController extends AppBaseController
{
    /** @var  Utilisateur\UsersRepository */
    private $users;

    public function __construct(UsersRepository $user)
    {
        $this->users = $user;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $contact = substr($request->contact, 1, 13);
        $admin = $this->users->latest()->where('contact', $contact)->where('is_admin', 1)->first();

        if($admin){
            $success['token'] =  $admin->createToken('MyApp', ['admin'])->accessToken;
            $success['id'] =  $admin->id;
            $success['nom'] =  $admin->name;
            $success['contact'] =  $admin->contact;
            $success['photo'] =  $admin->photo;
            $success['dateInscription'] =  substr($admin->created_at, 0, 10);
            $success['heureInscription'] =  substr($admin->created_at, 11, 5);

            // ENVOI DE SMS
            // $code  = strtoupper(substr(md5(uniqid()), 0, 5));
            $code  = 'abcde';
            $nom = $success['nom'];
            $extract = substr($request->contact, 2, 8);
            $numero = intval($extract);
            $message = "Bonjour $nom, veuillez utiliser le code suivant pour vous authentifié. Code : $code";
            $response = Http::get("https://admin.sms-mail.pro/sms/api?action=send-sms&api_key=ZGF5bW9uZDoxNDdkYXltb25k&to=$numero&from=DAYMOND&sms=$message");
            $response->body();

            $admin->update(['is_confirmed'=>$code]);

            return $this->sendResponse($success, 'Connexion réussi !');
        }
        else {
            return $this->sendError('Connexion échoué');
        }
    }

    protected function confirmation(Request $request)
    {
        $admin = $this->users->latest()->where('id', $request->id)->where('is_confirmed', $request->code)->first();
        if($admin){
            $admin->update([
                'is_confirmed'=>'user_account_confirmed'
            ]);
            return $this->sendSuccess('Compte confirmé');
        }
        else {
            return $this->sendError("Le code n'est pas valide !");
        }
    }
}
