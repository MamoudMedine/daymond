<?php

namespace App\Http\Controllers\Api\Utilisateur;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Repositories\API\CommandeRepository;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\AppBaseController;

class CommandeController extends AppBaseController
{
    /** @var  Utilisateur\CommandeRepository */
    private $commandes;

    public function __construct(CommandeRepository $cmd)
    {
        $this->commandes = $cmd;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $data = $request->all();
        $insertClient = Client::create([
            'nom' => $data['nom'],
            'contact' => $data['contact'],
            'adresse' => $data['adresse'],
            'utilisateur_id' => $data['utilisateurId'],
        ]);
        $insert = $this->commandes->create([
            'quantite_produit' => $data['quantiteProduit'],
            'prix_vente' => $data['prixVente'],
            'autre_details' => $data['autreDetail'],
            'date_livraison' => $data['dateLivraison'],
            'produit_id' => $data['produitId'],
            'utilisateur_id' => $data['utilisateurId'],
            'client_id' => $insertClient->id,
            'type_commande_id' => 1,
        ]);
        if($insert)
            return $this->sendSuccess('Commande ajoutée !');
        else
            return $this->sendError('Erreur d\'ajout de la commande !');
    }

    /**
     * @param $utilisateur_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCommandes($utilisateur_id)
    {
        $commandes = $this->commandes->with(['produit'])->where('utilisateur_id', $utilisateur_id)->latest()->get();
        $collection = new Collection([]);
        if($commandes) {
            foreach ($commandes as $commande) {
                if(!empty($commande->produit->media)) {
                    $data = [
                        'commande' => $commande,
                        'produit' => $commande->produit,
                        'frais' => $commande->produit->livraison,
                        'utilisateur' => $commande->utilisateur,
                        'adresse' => $commande->utilisateur->adresse,
                        'media' => $commande->produit->media,
                        'typeCommande' => $commande->typecommande,
                        'client' => $commande->client
                    ];
                }
                else {
                    $data = [
                        'commande' => $commande,
                        'produit' => $commande->produit,
                        'frais' => $commande->produit->livraison,
                        'utilisateur' => $commande->utilisateur,
                        'adresse' => $commande->utilisateur->adresse,
                        'media' => [],
                        'typeCommande' => $commande->typecommande,
                        'client' => $commande->client
                    ];
                }
                $collection->push($data);
            }
            return $this->sendResponse($collection, 'Liste des produits de l\'utilisateur');
        }
        else
            return $this->sendError('Erreur de récupération des produits');
    }

    /**
     * @param $cmd_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCommande($cmd_id)
    {
        try {
            $commande = $this->commandes->find($cmd_id);
            return response()->json(['success'=>true, 'commandes'=>$commande]);
        }  catch(\Exception $e){
            return response()->json(['success'=>false]);
        }
    }
    
    /**
     * deleteCommande
     *
     * @return void
     */
    public function deleteCommande(Request $request)
    {
        $data = $request->all();
        $check = $this->commandes->latest()->where('id', $data['commandeId'])
                                ->where('utilisateur_id', $data['userId'])
                                ->first();
        $this->commandes->delete($check->id);
        return $this->sendSuccess('Commande supprimé !');
    }
}
