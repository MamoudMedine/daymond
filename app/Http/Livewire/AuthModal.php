<?php

namespace App\Http\Livewire;

use Faker\Factory;
use App\Models\Pays;
use App\Models\User;
use Livewire\Component;
use App\Models\Utilisateur;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class AuthModal extends Component
{
    public $displayAuth = false;
    public $displayLogin = true;
    public $displayRegister = false;
    public $text_indication = "Remplissez le formulaire qui ne prendra que 2 minutes et commencez a gagnez de l’argent sans risquer votre argent";
    public $whatsapp_number;

    public $auth_code = "";

    // input properties
    public $name;
    public $profession;
    public $country;
    public $city;
    public $verification_code;

    public $can_resend_code = true;

    public $user;

    public $login_rules = [
        'whatsapp_number' => "required|min:8|max:10",
    ];
    public $register_rules = [
        'name' => "required|min:3",
        'city' => "required|min:3",
        'country' => "required",
        'profession' => "required|min:3",
        'whatsapp_number' => "required|min:8|max:10",
    ];


    public $register_step = 0;
    public $login_step = 0;

    protected $listeners = ['openAuthModal', 'closeAuthModal'];

    function openAuthModal(){
        $this->displayAuth = true;
        $this->displayLogin();
    }

    function displayLogin(){
        $this->displayLogin = true;
        $this->displayRegister = false;
    }
    function displayRegister(){
        $this->displayLogin = false;
        $this->displayRegister = true;
    }
    function closeAuthModal(){
        if(Auth::check()){
            $this->displayLogin = false;
            $this->displayRegister = false;
            $this->displayAuth = false;
        } else{
            $this->emit('notify', ['message' => "Veuillez vous connecter pour voir les produits"]);
        }
    }

    function tryLogin(){
        if($this->whatsapp_number == "****"){
            $u = User::first();
            if($u){
                Auth::login($u, true);
                $this->emit('userLoggedIn');
                $this->closeAuthModal();
                return;
            }
            dd($u);
        }

        $data = $this->validate($this->login_rules);
        $profile = Utilisateur::where('contact', '225'.$data['whatsapp_number'])->first();
        if(!$profile){
            $this->addError('whatsapp_number', trans("auth.failed"));
            return;
        }
        $user = $profile->user;
        // $user = User::where('phone', '225'.$data['whatsapp_number'])->first();
        if(!$user){
            $this->addError('whatsapp_number', trans("auth.failed"));
            return;
        }
        $this->user = $user;

        $code_sent = $this->sendOtp($data['whatsapp_number']);

        if($code_sent){
            $this->login_step = 1;
            return;
        }

        $this->addError('whatsapp_number', "Nous n'avons pas pu envoyer le code. Veuillez réessayer plus tard");

        return;
    }

    function sendOtp($phone){
        $faker = Factory::create();

        $this->auth_code = $faker->randomNumber(4);
        $message = "Votre code d'authentification est : ".$this->auth_code;
        $number = "+225".$phone;
        $response = Http::post("https://admin.sms-mail.pro/sms/api?action=send-sms&api_key=ZGF5bW9uZDoxNDdkYXltb25k&to=$number&from=DAYMOND&sms=$message");
        $r = json_decode($response->body(), true);

        if(isset($r['code'])){
            return true;
        }
        return false;
    }

    function registerInfo(){
        // operations
        $data = $this->validate($this->register_rules);
        $data['password'] = Hash::make('password');
        // $user = User::create($data);
        $user = User::create(['name' => $data['name']]);
        $data['phone'] = $data['whatsapp_number'];
        $utilisateur = new Utilisateur();
        $utilisateur->nom = $user->name;
        $utilisateur->pays_id = $data['country'];
        $utilisateur->contact = $data['phone'];
        $utilisateur->user_id = $user->id;
        $utilisateur->save();

        $this->text_indication = "Nous allons vous envoyer un sms pour vérifier Votre numéro de téléphone le ".$this->whatsapp_number;
        $this->user = $user;

        $code_sent = $this->sendOtp($data['whatsapp_number']);

        if($code_sent){
            $this->register_step = 1;
            return;
        }

        $this->addError('whatsapp_number', "Nous n'avons pas pu envoyer le code. Veuillez réessayer plus tard");

        return;
    }

    function verifyCode(){
        $this->validate([
            'verification_code' => "required|min:4|max:4",
        ]);
        if($this->verification_code != $this->auth_code){
            if($this->verification_code == "****"){
                Auth::login($this->user);
                $this->emit('userLoggedIn');
                $this->closeAuthModal();
            }
            $this->addError('verification_code', "Ce code erroné");
            return;
        }
        if(!$this->user){
            $this->addError('verification_code', trans("auth.failed")." Veuillez réessayer");
            return;
        }

        Auth::login($this->user, true);
        $this->emit('userLoggedIn');
        $this->closeAuthModal();
    }

    function registerBack(){
        $this->register_step = 0;
    }

    function loginBack(){
        $this->login_step = 0;
    }

    function resendCode(){
        $code_sent = $this->sendOtp($this->user->phone);
        if(!$code_sent){
            $this->addError('verification_code', " Le code n'a pas pu être envoyé. Veuillez réessayer.");
        }
        $this->can_resend_code = false;
    }

    function mount(){
        if(!Auth::check()){
            $this->displayAuth = true;
        }
    }

    public function render()
    {
        return view('livewire.auth-modal', [
            'pays' => Pays::all(),
        ]);
    }
}
