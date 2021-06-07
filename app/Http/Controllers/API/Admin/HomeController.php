<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Adresse;
use App\Models\User;
use App\Models\Utilisateur;
use App\Http\Controllers\AppBaseController;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends AppBaseController
{
    public function getIcon()
    {
        $recup = Media::where('type', 'logo')->first();
        if($recup)
            return $this->sendResponse($recup, 'Récupération du logo');
        else
            return $this->sendError('Aucun logo trouvé');
    }

    public function changeIcon(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image',
        ]);
        $files = $request->file('image');
        $destinationPath = public_path('storage/logo/');
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $check = Media::where('source', "logo")->first();
        $image = strstr($check->src, '20');
        if(file_exists($destinationPath.$image))
            unlink($destinationPath.$image);
        $files->move($destinationPath, $profileImage);
        $check->updateOrCreate(
            ['source' => 'logo'],
            ['src' => env('APP_URL') . "/public/storage/logo/$profileImage"],
        );
        if($check)
            return $this->sendSuccess("Le logo a été uploadé !");
        else
            return $this->sendError("Le logo n'a pas été uploadé");
    }

    public function deleteIcon()
    {
        $recup = Media::where('source', 'logo')->first();
        if($recup) {
            $image = strstr($recup->src, '20');
            $destinationPath = public_path('storage/logo/');
            if(file_exists($destinationPath.$image))
                unlink($destinationPath.$image);
            $recup->destroy($recup->id);
            return $this->sendusers('logo supprimer');
        }
        else
            return $this->sendError('Aucune logo trouvé');
    }

    public function getBanner()
    {
        $banner = Media::where('source', 'like', '%' . 'banner' . '%')->latest()->limit(7)->get();
        return $this->sendResponse($banner, 'Liste des 7 dernières bannières');
    }

    public function changeBanner(Request $request)
    {
        for($i = 0; $i < $request->count; $i++) {
            $this->validate($request, [
                "image$i" => 'required|image',
            ]);
            $files = $request->file("image$i");
            $destinationPath = public_path('storage/banner/');
            $profileImage = date("YmdHis$i") . "." . $files->getClientOriginalExtension();
            $check = Media::where('source', "banner$i")->first();
            $image = strstr($check->src, '20');
            if(file_exists($destinationPath.$image)) // check if file exist in directory
                unlink($destinationPath.$image); // Delete file in directory
            $files->move($destinationPath, $profileImage);
            $check->updateOrCreate(
                ['source' => "banner$i"],
                ['src' => env('APP_URL') . "/public/storage/banner/$profileImage"]
            );
        }
        return $this->sendusers("Le logo a été uploadé !");
    }

    public function deleteBanner()
    {
        $recup = Media::where('source', 'like', '%' . 'banner' . '%')->get();
        if($recup) {
            foreach($recup as $rec) {
                $image = strstr($rec->src, '20');
                $destinationPath = public_path('storage/banner/');
                if(file_exists($destinationPath.$image))
                    unlink($destinationPath.$image);
                $rec->destroy($rec->id);
            }
            return $this->sendusers('Banner supprimer');
        }
        else
            return $this->sendError('Aucune banner trouvé');
    }

    // public function addUser(Request $request)
    // {
    //     $data = $request->all();
    //     $validator = $this->validate($request, [
    //             'nom' => 'required|string',
    //             'pays' => 'required|string',
    //             'ville' => 'required|string',
    //             'profession' => 'required|string',
    //             'contact' => 'required|unique:utilisateurs',
    //         ], 
    //         [
    //             'nom.required'=>'le nom est obligatoire svp',
    //             'nom.string'=>'le nom doit etre une chaine de caractere svp',
    //             'pays.required'=>'le pays est obligatoire svp',
    //             'pays.string'=>'le pays doit etre une chaine de caractere svp',
    //             'ville.required'=>'la ville est obligatoire svp',
    //             'ville.string'=>'la ville doit etre une chaine de caractere svp',
    //             'contact.required'=>'le contact est obligatoire svp',
    //             'contact.unique'=>'Desolé, ce contact existe déja',
    //         ]
    //     );

    //     $adresse = Adresse::create([
    //         'pays'=>$data['pays'],
    //         'ville'=>$data['ville'],
    //     ]);
    //     $users = Utilisateur::create([
    //         'nom' => $data['nom'],
    //         'profession' => $data['profession'],
    //         'contact' => $data['contact'],
    //         'etoile' => intval($data['etoile']),
    //         'adresse_id' => $adresse->id,
    //         'photo' => $data['photo']
    //     ]);
    //     if($users)
    //         return $this->sendResponse('users ajouté !', $users);
    //     else
    //         return $this->sendError('Impossible d\'ajouter l\'users');
    // }
    
    /**
     * addUser
     *
     * @param  mixed $request
     * @return void
     */
    public function addUser(Request $request)
    {
        $data = $request->all();
        $users = Utilisateur::create([
            'nom' => $data['nom'],
            'contact' => $data['contact'],
        ]);
        if($users)
            return $this->sendSuccess('users ajouté !');
        else
            return $this->sendError('Impossible d\'ajouter l\'users');
    }

    public function getAbonne()
    {
        $utilisateurs = Utilisateur::with('adresse')->latest()->get();
        $collections = new Collection([]);
        foreach($utilisateurs as $utilisateur) {
            $day = substr(substr($utilisateur->created_at, 0, 10), 8, 2);
            $month = substr(substr($utilisateur->created_at, 0, 10), 5, 2);
            $year = substr(substr($utilisateur->created_at, 0, 10), 0, 4);
            $data = [
                'utilisateur' => $utilisateur,
                'adresse' => $utilisateur->adresse,
                'dateInscription' => "$day/$month/$year",
                'heureInscription' => substr($utilisateur->created_at, 11, 5),
            ];
            $collections->push($data);
        }
        return $this->sendResponse($collections, 'Liste des utilisateurs');
    }

    public function updateAccount(Request $request)
    {
        $data = $request->all();
        $user = Utilisateur::where('id', $data['id'])->first();
        $update = $user->update([
            'etoile' => $data['etoile'],
            'etoile_plus' => $data['etoile_plus'],
        ]);
        if($update)
            return $this->sendSuccess('Information modifié');
        else
            return $this->sendError('Erreur de modification');
    }

    public function adminProfile()
    {
        $admin = User::where('contact', auth()->user()->contact)->first();
        if(!empty($admin))
            return $this->sendResponse($admin, 'Information de l\'administrateur');
        else
            return $this->sendError('Aucun admin connecté');
    }
}
