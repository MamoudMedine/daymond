<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\API\CommandeRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Produit;
use App\Models\Utilisateur;
use App\Models\Client;
use App\Models\CommandeEpingle;
use App\Models\Rappel;
use App\Models\TypeCommande;
use App\Models\Payment;
use App\Models\Commande;

class CommandeController extends AppBaseController
{
    private $commande;
        
    /**
     * __construct
     *
     * @param  mixed $commande
     * @return void
     */
    public function __construct(CommandeRepository $cmd)
    {
        $this->commande = $cmd;
    }
    
    /**
     * Get count for new commande
     *
     * @return void
     */
    public function countNewCommande()
    {
        try {
            // $counts = $this->commande->latest()->where('type_commande_id', 1)->count();
            $counts = Commande::join('produits', 'commandes.produit_id', 'produits.id')
                            ->where('commandes.type_commande_id', 1)
                            ->where('produits.deleted_at', null)
                            ->count();

            return $this->sendResponse($counts, "Nombre de nouvelle commande");
        }
        catch(Exception $e) {
            return $this->sendError('Erreur de récupération');
        }
    }

    /**
     * Get count for commande en cours
     *
     * @return void
     */
    public function countCommandeEnCours()
    {
        try {
            // $counts = $this->commande->latest()->where('type_commande_id', 2)->count();
            $counts = Commande::join('produits', 'commandes.produit_id', 'produits.id')
                            ->where('commandes.type_commande_id', 2)
                            ->where('produits.deleted_at', null)
                            ->count();

            return $this->sendResponse($counts, "Nombre de commande en cours");
        }
        catch(Exception $e) {
            return $this->sendError('Erreur de récupération');
        }
    }

    /**
     * Get count for commande validee
     *
     * @return void
     */
    public function countCommandeValidee()
    {
        try {
            // $counts = $this->commande->latest()->where('type_commande_id', 3)->count();
            $counts = Commande::join('produits', 'commandes.produit_id', 'produits.id')
                            ->where('commandes.type_commande_id', 3)
                            ->where('produits.deleted_at', null)
                            ->count();

            return $this->sendResponse($counts, "Nombre de commande validée");
        }
        catch(Exception $e) {
            return $this->sendError('Erreur de récupération');
        }
    }

    /**
     * Get count for commande annulée
     *
     * @return void
     */
    public function countCommandeAnnulee()
    {
        try {
            // $counts = $this->commande->latest()->where('type_commande_id', 4)->count();
            $counts = Commande::join('produits', 'commandes.produit_id', 'produits.id')
                            ->where('commandes.type_commande_id', 4)
                            ->where('produits.deleted_at', null)
                            ->count();

            return $this->sendResponse($counts, "Nombre de commande annulée");
        }
        catch(Exception $e) {
            return $this->sendError('Erreur de récupération');
        }
    }

    public function getNewCommande()
    {
        try {
            // $counts = $this->commande->latest()->where('type_commande_id', 1)->get();
            $counts = Commande::join('produits', 'commandes.produit_id', 'produits.id')
                            ->where('commandes.type_commande_id', 1)
                            ->where('produits.deleted_at', null)
                            ->selectRaw('commandes.id, commandes.quantite_produit, commandes.prix_vente, commandes.autre_details, commandes.date_livraison, commandes.status, commandes.produit_id, commandes.utilisateur_id, commandes.client_id, commandes.type_commande_id, commandes.date, commandes.note, commandes.commission, commandes.created_at')
                            ->get();

            $collection = new Collection([]);
            foreach($counts as $count) {
                if(!empty($count->produit->media)) {
                    $data = [
                        'commande' => $count,
                        'produit' => $count->produit,
                        'frais' => $count->produit->livraison,
                        'utilisateur' => $count->utilisateur,
                        'adresse' => $count->utilisateur->adresse,
                        'media' => $count->produit->media,
                        'typeCommande' => $count->typecommande,
                        'client' => $count->client
                    ];
                    $collection->push($data);
                }
                else {
                    $data = [
                        'commande' => $count,
                        'produit' => $count->produit,
                        'frais' => $count->produit->livraison,
                        'utilisateur' => $count->utilisateur,
                        'adresse' => $count->utilisateur->adresse,
                        'media' => [],
                        'typeCommande' => $count->typecommande,
                        'client' => $count->client
                    ];
                    $collection->push($data);
                }
            }
            return $this->sendResponse($collection, "Nombre de nouvelle commande");
        }
        catch(Exception $e) {
            return $this->sendError('Erreur de récupération');
        }
    }

    /**
     * Get count for commande en cours
     *
     * @return void
     */
    public function getCommandeEnCours()
    {
        try {
            // $counts = $this->commande->latest()->where('type_commande_id', 2)->get();
            $counts = Commande::join('produits', 'commandes.produit_id', 'produits.id')
                            ->where('commandes.type_commande_id', 2)
                            ->where('produits.deleted_at', null)
                            ->selectRaw('commandes.id, commandes.quantite_produit, commandes.prix_vente, commandes.autre_details, commandes.date_livraison, commandes.status, commandes.produit_id, commandes.utilisateur_id, commandes.client_id, commandes.type_commande_id, commandes.date, commandes.note, commandes.commission, commandes.created_at')
                            ->get();

            $collection = new Collection([]);
            foreach($counts as $count) {
                if(!empty($count->produit->media)) {
                    $data = [
                        'commande' => $count,
                        'produit' => $count->produit,
                        'frais' => $count->produit->livraison,
                        'utilisateur' => $count->utilisateur,
                        'adresse' => $count->utilisateur->adresse,
                        'media' => $count->produit->media,
                        'typeCommande' => $count->typecommande,
                        'client' => $count->client
                    ];
                    $collection->push($data);
                }
                else {
                    $data = [
                        'commande' => $count,
                        'produit' => $count->produit,
                        'frais' => $count->produit->livraison,
                        'utilisateur' => $count->utilisateur,
                        'adresse' => $count->utilisateur->adresse,
                        'media' => [],
                        'typeCommande' => $count->typecommande,
                        'client' => $count->client
                    ];
                    $collection->push($data);
                }
            }
            return $this->sendResponse($collection, "Nombre de commande en cours");
        }
        catch(Exception $e) {
            return $this->sendError('Erreur de récupération');
        }
    }

    /**
     * Get count for commande validee
     *
     * @return void
     */
    public function getCommandeValidee()
    {
        try {
            // $counts = $this->commande->latest()->where('type_commande_id', 3)->get();
            $counts = Commande::join('produits', 'commandes.produit_id', 'produits.id')
                            ->where('commandes.type_commande_id', 3)
                            ->where('produits.deleted_at', null)
                            ->selectRaw('commandes.id, commandes.quantite_produit, commandes.prix_vente, commandes.autre_details, commandes.date_livraison, commandes.status, commandes.produit_id, commandes.utilisateur_id, commandes.client_id, commandes.type_commande_id, commandes.date, commandes.note, commandes.commission, commandes.created_at')
                            ->get();

            $collection = new Collection([]);
            foreach($counts as $count) {
                if(!empty($count->produit->media)) {
                    $data = [
                        'commande' => $count,
                        'produit' => $count->produit,
                        'frais' => $count->produit->livraison,
                        'utilisateur' => $count->utilisateur,
                        'adresse' => $count->utilisateur->adresse,
                        'media' => $count->produit->media,
                        'typeCommande' => $count->typecommande,
                        'client' => $count->client
                    ];
                    $collection->push($data);
                }
                else {
                    $data = [
                        'commande' => $count,
                        'produit' => $count->produit,
                        'frais' => $count->produit->livraison,
                        'utilisateur' => $count->utilisateur,
                        'adresse' => $count->utilisateur->adresse,
                        'media' => [],
                        'typeCommande' => $count->typecommande,
                        'client' => $count->client
                    ];
                    $collection->push($data);
                }
            }
            return $this->sendResponse($collection, "Nombre de commande validée");
        }
        catch(Exception $e) {
            return $this->sendError('Erreur de récupération');
        }
    }

    /**
     * Get count for commande annulée
     *
     * @return void
     */
    public function getCommandeAnnulee()
    {
        try {
            // $counts = $this->commande->latest()->where('type_commande_id', 4)->get();
            $counts = Commande::join('produits', 'commandes.produit_id', 'produits.id')
                            ->where('commandes.type_commande_id', 4)
                            ->where('produits.deleted_at', null)
                            ->selectRaw('commandes.id, commandes.quantite_produit, commandes.prix_vente, commandes.autre_details, commandes.date_livraison, commandes.status, commandes.produit_id, commandes.utilisateur_id, commandes.client_id, commandes.type_commande_id, commandes.date, commandes.note, commandes.commission, commandes.created_at')
                            ->get();

            $collection = new Collection([]);
            foreach($counts as $count) {
                if(!empty($count->produit->media)) {
                    $data = [
                        'commande' => $count,
                        'produit' => $count->produit,
                        'frais' => $count->produit->livraison,
                        'utilisateur' => $count->utilisateur,
                        'adresse' => $count->utilisateur->adresse,
                        'typeCommande' => $count->typecommande,
                        'client' => $count->client,
                        'media' => $count->produit->media,
                    ];
                    $collection->push($data);
                }
                else {
                    $data = [
                        'commande' => $count,
                        'produit' => $count->produit,
                        'frais' => $count->produit->livraison,
                        'utilisateur' => $count->utilisateur,
                        'adresse' => $count->utilisateur->adresse,
                        'typeCommande' => $count->typecommande,
                        'client' => $count->client,
                        'media' => [],
                    ];
                    $collection->push($data);
                }
            }
            return $this->sendResponse($collection, "Nombre de commande annulée");
        }
        catch(Exception $e) {
            return $this->sendError('Erreur de récupération');
        }
    }
    
    /**
     * deleteCommande
     *
     * @return void
     */
    public function deleteCommande($id)
    {
        $this->commande->delete($id);
        return $this->sendSuccess('Commande supprimé !');
    }
    
    /**
     * deleteCommandeByProduct
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteCommandeByProduct($id)
    {
        $commandeId = Produit::where('id', $id)->first();
        $this->commande->delete($commandeId->id);
        return $this->sendSuccess('Commande supprimé !');
    }
    
    /**
     * deleteCommandeEpingleByProduct
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteCommandeEpingleByProduct($id)
    {
        $commandeId = Produit::where('id', $id)->first();
        CommandeEpingle::delete($commandeId->id);
        return $this->sendSuccess('Commande supprimé !');
    }
    
    /**
     * deleteCommandeRappelByProduct
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteCommandeRappelByProduct($id)
    {
        $commandeId = Produit::where('id', $id)->first();
        Rappel::delete($commandeId->id);
        return $this->sendSuccess('Commande supprimé !');
    }
    
    /**
     * getCommandeEpingle
     *
     * @return void
     */
    public function getCommandeEpingle()
    {
        try {
            $commande = CommandeEpingle::latest()->get();
            $collection = new Collection([]);
            foreach($commande as $count) {
                if(!empty($count->produit->media)) {
                    $data = [
                        'commande' => $count->commande,
                        'produit' => $count->produit,
                        'frais' => $count->produit->livraison,
                        'utilisateur' => $count->utilisateur,
                        'adresse' => $count->utilisateur->adresse,
                        'typeCommande' => $count->commande->typecommande,
                        'client' => $count->client,
                        'media' => $count->produit->media,
                    ];
                    $collection->push($data);
                }
                else {
                    $data = [
                        'commande' => $count->commande,
                        'produit' => $count->produit,
                        'frais' => $count->produit->livraison,
                        'utilisateur' => $count->utilisateur,
                        'adresse' => $count->utilisateur->adresse,
                        'typeCommande' => $count->commande->typecommande,
                        'client' => $count->client,
                        'media' => [],
                    ];
                    $collection->push($data);
                }
            }
            return $this->sendResponse($collection, "Liste des commandes épinglé");
        }
        catch(Exception $e) {
            return $this->sendError('Erreur de récupération');
        }
    }
    
    /**
     * commandeEpingle
     *
     * @param  mixed $request
     * @return void
     */
    public function commandeEpingle(Request $request)
    {
        $data = $request->all();
        $produit = Produit::where('id', $data['produitId'])->first();
        $commande = $this->commande->latest()->where('id', $data['commandeId'])->first();
        $utilisateur = Utilisateur::where('id', $data['userId'])->first();
        $client = Client::where('id', $data['clientId'])->first();

        $insert = CommandeEpingle::updateOrCreate(
            ['commande_id' => $data['commandeId']],
            [
                'produit_id' => $produit->id, 
                'commande_id' => $commande->id, 
                'utilisateur_id' => $utilisateur->id, 
                'client_id' => $client->id
            ],
        );
        if($insert)
            return $this->sendSuccess('Commande épinglé');
        else
            return $this->sendError('Erreur d\'ajout de la commande');
    }
    
    /**
     * commandeRappel
     *
     * @param  mixed $request
     * @return void
     */
    public function commandeRappel(Request $request)
    {
        $data = $request->all();
        $produit = Produit::where('id', $data['produitId'])->first();
        $commande = $this->commande->latest()->where('id', $data['commandeId'])->first();
        $utilisateur = Utilisateur::where('id', $data['userId'])->first();
        $client = Client::where('id', $data['clientId'])->first();

        $insert = Rappel::updateOrCreate(
            ['commande_id' => $data['commandeId']],
            [
                'produit_id' => $produit->id, 
                'commande_id' => $commande->id, 
                'utilisateur_id' => $utilisateur->id, 
                'client_id' => $client->id,
                'date_rappel' => $data['date'],
                'frequence' => $data['nbre'],
                'type' => $data['type'],
            ],
        );
        if($insert)
            return $this->sendSuccess('Rappel ajouté');
        else
            return $this->sendError('Erreur d\'ajout du rappel');
    }
    
    /**
     * getRappel
     *
     * @return void
     */
    public function getRappel()
    {
        try {
            $commande = Rappel::latest()->get();
            $collection = new Collection([]);
            foreach($commande as $count) {
                $data = [
                    'commande' => $count->commande,
                    'produit' => $count->produit,
                    'utilisateur' => $count->utilisateur,
                    'client' => $count->client,
                ];
                $collection->push($data);
            }
            return $this->sendResponse($collection, "Liste des rappels");
        }
        catch(Exception $e) {
            return $this->sendError('Erreur de récupération');
        }
    }
    
    /**
     * changeCommandeState
     *
     * @return void
     */
    public function changeCommandeState(Request $request)
    {
        $data = $request->all();
        $check = $this->commande->latest()->where('id', $data['commandeId'])->first();
        $cmd = TypeCommande::where('nom', $data['newCommandeState'])->first();
        $check->update([
            'type_commande_id' => $cmd->id,
            'note' => $data['note'],
            'commission' => $data['commission']
        ]);
        if($check) {
            if($cmd->nom == 'Commande en cours')
                return $this->sendSuccess('La commande est en cours');
            else if($cmd->nom == 'Commande validée')
                return $this->sendSuccess('La commande est validée');
            else if($cmd->nom == 'Commande annulée')
                return $this->sendSuccess('La commande est annulée');
        }            
        else
            return $this->sendError('Erreur de changement d\'état');
    }
    
    /**
     * Paiement
     *
     * @param  mixed $request
     * @return void
     */
    public function Paiement(Request $request)
    {
        $data = $request->all();
        $check = $this->commande->latest()->where('id', $data['commandeId'])->first();
        $verify = Payment::where('commande_id', $data['commandeId'])->first();
        if($verify)
            return $this->sendSuccess('le paiement à déjà été effectué !');
        else {
            $insert = Payment::create([
                'date_paiement' => $data['date'],
                'reference_paiement' => $data['ref'],
                'montant' => $data['commission'],
                'commande_id' => $check->id,
                'is_paid' => 1
            ]);
            if($insert)
                return $this->sendSuccess('Paiement effectué !');
            else
                return $this->sendError('Erreur de traitement du paiement !');
        }
    }
    
    /**
     * getCommandeValideeWherePaymentIsNotDo
     *
     * @return void
     */
    public function getCommandeValideeWherePaymentIsNotDo()
    {
        try {
            $collection = new Collection([]);
            foreach(Commande::where('type_commande_id', 3)->get() as $com) {
                if(!$com->payment){
                    $data = [
                        'commande' => $com,
                        'produit' => $com->produit,
                        'frais' => $com->produit->livraison,
                        'utilisateur' => $com->utilisateur,
                        'adresse' => $com->utilisateur->adresse,
                        'typeCommande' => $com->typecommande,
                        'client' => $com->client,
                        'media' => $com->produit->media,
                    ];
                    $collection->push($data);
                }
            }
            return $this->sendResponse($collection, "Nombre des commandes non payé");
        }
        catch(Exception $e) {
            return $this->sendError('Erreur de récupération');
        }
    }
    
    /**
     * getCommandeValideeWherePaymentIsDo
     *
     * @return void
     */
    public function getCommandeValideeWherePaymentIsDo()
    {
        try {
            $collection = new Collection([]);
            foreach(Commande::where('type_commande_id', 3)->get() as $com) {
                if($com->payment){
                    $data = [
                        'commande' => $com,
                        'produit' => $com->produit,
                        'frais' => $com->produit->livraison,
                        'utilisateur' => $com->utilisateur,
                        'adresse' => $com->utilisateur->adresse,
                        'typeCommande' => $com->typecommande,
                        'client' => $com->client,
                        'payment' => $com->payment,
                        'media' => $com->produit->media,
                    ];
                    $collection->push($data);
                }
            }
            return $this->sendResponse($collection, "Nombre des commandes payé");
        }
        catch(Exception $e) {
            return $this->sendError('Erreur de récupération');
        }
    }
}
