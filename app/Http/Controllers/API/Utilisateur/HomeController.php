<?php

namespace App\Http\Controllers\API\Utilisateur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Adresse;
use App\Models\User;
use App\Models\Historique;
use App\Models\Utilisateur;
use App\Models\Cart;
use App\Models\CartProduit;
use App\Http\Controllers\AppBaseController;
use Illuminate\Database\Eloquent\Collection;

class HomeController extends AppBaseController
{    
    /**
     * getIcon
     *
     * @return void
     */
    public function getIcon()
    {
        $recup = Media::where('type', 'logo')->first();
        if($recup)
            return $this->sendResponse($recup, 'Récupération du logo');
        else
            return $this->sendError('Aucun logo trouvé');
    }
    
    /**
     * getBanner
     *
     * @return void
     */
    public function getBanner()
    {
        $banner = Media::where('source', 'like', '%' . 'banner' . '%')->latest()->limit(7)->get();
        return $this->sendResponse($banner, 'Liste des 7 dernières bannières');
    }
    
    /**
     * addHistorique
     *
     * @return void
     */
    public function addHistorique(Request $request)
    {
        $data = $request->all();
        $insert = Historique::updateOrCreate(
            [
                'produit_id' => $data['produitId'],
                'utilisateur_id' => $data['userId'], 
            ],
            [
                'produit_id' => $data['produitId'], 
                'utilisateur_id' => $data['userId'], 
            ],
        );
        if($insert)
            return $this->sendSuccess('Produit ajouté à l\'historique');
        else
            return $this->sendError('Erreur d\'ajout du produit à l\'historique');
    }
    
    /**
     * removeHistorique
     *
     * @return void
     */
    public function removeHistorique(Request $request)
    {
        $data = $request->all();
        $check = Historique::where('produit_id', $data['produitId'])
                        ->where('utilisateur_id', $data['userId'])
                        ->first();
        Historique::destroy($check->id);
        return $this->sendSuccess('Produit supprimer de l\'historique');
    }
    
    
    /**
     * getCart
     *
     * @return void
     */
    public function getCart($userId)
    {
        $carts = CartProduit::join('carts', 'cart_produit.cart_id', 'carts.id')
                            ->where('carts.user_id', $userId)
                            ->get();

        $collection = new Collection([]);
        foreach($carts as $cart) {
            if(!empty($cart->produit->media)) {
                $data = [
                    'cart' => $cart,
                    'produit' => $cart->produit,
                    'media' => $cart->produit->media
                ];
            }
            else {
                $data = [
                    'cart' => $cart,
                    'produit' => $cart->produit,
                ];
            }
            $collection->push($data);
        }

        if(!empty($carts))
            return $this->sendResponse($collection, 'Liste des produits du panier de l\'abonée');
        else
            return $this->sendError('Aucun produit au panier pour cet abonné');
    }


    /**
     * addToCart
     *
     * @param  mixed $request
     * @return void
     */
    public function addToCart(Request $request)
    {
        $data = $request->all();
        $cart = Cart::updateOrCreate(
            ['user_id' => $data['utilisateurId']]
        );
        $insert = CartProduit::updateOrCreate(
            [
                'cart_id' => $cart->id,
                'produit_id' => $data['productId'],
            ],
            [
                'cart_id' => $cart->id,
                'produit_id' => $data['productId'],
                'quantite' => $data['quantite'],
                'montant' => $data['montant'],
            ]
        );
        if($insert)
            return $this->sendSuccess('Produit ajouté au panier');
        else
            return $this->sendError('Erreur d\'ajout du produit au panier');
    }

    public function sendPhone(Request $request)
    {
        $data = $request->all();
        $check = Utilisateur::where('id', $data['userId'])->first();
        if(empty($check->contact_mobile_money)) {
            $check->update([
                'contact_mobile_money' => $data['userPhone']
            ]);
            if($check)
                return $this->sendSuccess('Contact ajoutée');
            else
                return $this->sendError('Erreur d\'ajout du contact');
        }
        else
            return $this->sendError('Le paiement a déjà été pris en compte');
    }
}
