<?php

namespace App\Http\Controllers\Api\Utilisateur;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\SousCategorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\API\ProduitRepository;
use App\Http\Controllers\AppBaseController;

class ProduitController extends AppBaseController
{
    /** @var  Utilisateur\ProduitRepository */
    private $products;

    public function __construct(ProduitRepository $produits)
    {
        $this->products = $produits;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProduits()
    {
        try {
            $produits = $this->products->latest()->get();
            // $produits = Produit::join('transactions', 'produits.transaction_id', 'transactions.id')
            //                 ->join('etats', 'produits.etat_id', 'etats.id')
            //                 ->join('localisations', 'produits.localisation_id', 'localisations.id')
            //                 ->join('livraisons', 'produits.id', 'livraisons.produit_id')
            //                 ->join('niveaux', 'produits.niveau_id', 'niveaux.id')
            //                 ->join('categories', 'produits.categorie_id', 'categories.id')
            //                 ->join('medias', 'produits.id', 'medias.produit_id')
            //                 ->join('type_couts', 'produits.type_cout_id', 'type_couts.id')
            //                 ->join('commandes', 'produits.id', 'commandes.produit_id')
            //                 ->join('type_commande', 'commandes.type_commande_id', 'type_commande.id')
            //                 ->selectRaw('produits.nom, produits.id, produits.nom, produits.sous_titre, produits.description, transactions.nom, etats.nom, produits.quantite, localisations.nom, type_couts.nom, produits.prix, produits.prix_reduction, produits.commission, produits.prix_suggestion1, produits. prix_suggestion2, produits.prix_grossiste1, produits.prix_grossiste2, produits.created_at, type_commande.nom, categories.nom, livraisons.frais')
            //                 ->get();

            $collection = new Collection([]);
            foreach ($produits as $produit) {
                // $c = $produit->commandes->first();
                // $t = $c->typecommande->first();
                $data = [
                    'produit' => $produit,
                    'transaction' => $produit->transaction,
                    'etat' => $produit->etat,
                    'localisation' => $produit->localisation,
                    'livraison' => $produit->livraison,
                    'niveau' => $produit->niveau,
                    'categorie' => $produit->categorie,
                    'media' => $produit->media,
                    'typecout' => $produit->typecout,
                    // 'typecommande' => $produit->commandes,
                ];
                $collection->push($data);
            }
            return $this->sendResponse($collection, 'Liste des produits');
        } catch(\Exception $e){
            return $this->sendError('Erreur de récupération des produits' . $e);
        }

    }
    
    /**
     * getVenteFlashProduct
     *
     * @return void
     */
    public function getVenteFlashProduct()
    {
        try {
            $produits = $this->products->latest()->where('niveau_id', 1)->get();

            $collection = new Collection([]);
            foreach ($produits as $produit) {
                $data = [
                    'produit' => $produit,
                    'transaction' => $produit->transaction,
                    'etat' => $produit->etat,
                    'localisation' => $produit->localisation,
                    'livraison' => $produit->livraison,
                    'niveau' => $produit->niveau,
                    'categorie' => $produit->categorie,
                    'media' => $produit->media,
                    'typecout' => $produit->typecout,
                ];
                $collection->push($data);
            }
            return $this->sendResponse($collection, 'Liste des produits');
        } catch(\Exception $e){
            return $this->sendError('Erreur de récupération des produits' . $e);
        }

    }
    
    /**
     * getRecentProduct
     *
     * @return void
     */
    public function getRecentProduct()
    {
        try {
            $produits = $this->products->latest()->where('niveau_id', 2)->get();

            $collection = new Collection([]);
            foreach ($produits as $produit) {
                $data = [
                    'produit' => $produit,
                    'transaction' => $produit->transaction,
                    'etat' => $produit->etat,
                    'localisation' => $produit->localisation,
                    'livraison' => $produit->livraison,
                    'niveau' => $produit->niveau,
                    'categorie' => $produit->categorie,
                    'media' => $produit->media,
                    'typecout' => $produit->typecout,
                ];
                $collection->push($data);
            }
            return $this->sendResponse($collection, 'Liste des produits');
        } catch(\Exception $e){
            return $this->sendError('Erreur de récupération des produits' . $e);
        }

    }

    /**
     * @param $produit_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProduit($produit_id)
    {
        try {
            $produit = Produit::find($produit_id);

            return response()->json(['success' => true, 'produit' => $produit]);
        }catch(\Exception $e){
            return response()->json(['success' => false]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchProduit($product)
    {
        $products = $this->products->latest()->where('nom', 'like', '%'. $product .'%')->get();
        if($products) {
            $collection = new Collection([]);
            foreach($products as $prod) {
                $data = [
                    'produit' => $prod,
                    'transaction' => $prod->transaction,
                    'etat' => $prod->etat,
                    'localisation' => $prod->localisation,
                    'typecout' => $prod->typecout,
                    'media' => $prod->media,
                    'typecommande' => $prod->typecommande,
                    'categorie' => $prod->categorie,
                    'livraison' => $prod->livraison,
                ];
                $collection->push($data);
            }
            return $this->sendResponse($collection, 'Liste des produits recherché');
        }
        else {
            return $this->sendError('Erreur de récupération des produits');
        }
    }


    /**
     * @param $categorie_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProduitsByCategorie($categorie, $isSousCategorie)
    {
        if($isSousCategorie == 1) {
            // $produits = $this->products->latest()->where('categorie_id', $categorie_id)->get();
            $produits = Produit::join('sous_categories', 'produits.sous_categorie_id', 'sous_categories.id')
                            ->where('sous_categories.nom', $categorie)
                            ->get();

            $collection = new Collection();
            foreach($produits as $produit) {
                $data = [
                    'produit' => $produit,
                    'transaction' => $produit->transaction,
                    'etat' => $produit->etat,
                    'localisation' => $produit->localisation,
                    'livraison' => $produit->livraison,
                    'niveau' => $produit->niveau,   
                    'categorie' => $produit->categorie,
                    'media' => $produit->media,
                    'typecout' => $produit->typecout,
                    // 'typecommande' => $produit->typecommande,
                ];
                $collection->push($data);
            }
        }
        else {
            // $produits = $this->products->latest()->where('categorie_id', $categorie_id)->get();
            $produits = Produit::join('categories', 'produits.categorie_id', 'categories.id')
                            ->where('categories.nom', $categorie)
                            ->get();

            $collection = new Collection();
            foreach($produits as $produit) {
                $data = [
                    'produit' => $produit,
                    'transaction' => $produit->transaction,
                    'etat' => $produit->etat,
                    'localisation' => $produit->localisation,
                    'livraison' => $produit->livraison,
                    'niveau' => $produit->niveau,   
                    'categorie' => $produit->categorie,
                    'media' => $produit->media,
                    'typecout' => $produit->typecout,
                    // 'typecommande' => $produit->typecommande,
                ];
                $collection->push($data);
            }
        }
        if($produits)
            return $this->sendResponse($collection, 'Liste des produits par catégories');
        else
            return $this->sendError('La catégorie ciblé n\'existe pas !');
    }
}
