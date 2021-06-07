<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\Produit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AppBaseController;
use Illuminate\Database\Eloquent\Collection;
use App\Repositories\API\ProduitRepository;
use App\Models\Etat;
use App\Models\Categorie;
use App\Models\TypeCout;
use App\Models\Niveau;
use App\Models\Transaction;
use App\Models\TypeProduit;
use App\Models\Media;
use App\Models\SousCategorie;

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

    public function createCommande(Request $request)
    {
        $data = $request->all();
        if($data['isSousCategorie'] == 1) {
            $sousCatId = SousCategorie::where('nom', $data['categorie'])->first();
            $catId = Categorie::where('id', $sousCatId->categorie_id)->first();
            $coutId = TypeCout::where('nom', $data['type_cout'])->first();
            $etatId = Etat::where('nom', $data['type_produit'])->first();
            $niveauId = Niveau::where('libelle', $data['niveau'])->first();
            $transId = Transaction::where('nom', $data['transaction'])->first();
            // $typeProdId = TypeProduit::where('nom', $data['type_produit'])->first();
            $insert = $this->products->create([
                'nom' => $data['nom'],
                'sous_titre' => $data['sous_titre'],
                'description' => $data['description'],
                'categorie_id' => $catId->id,
                'sous_categorie_id' => $sousCatId->id,
                'prix' => $data['prix_vente'],
                'prix_reduction' => $data['prix_reduction'],
                'commission' => $data['commission'],
                'prix_suggestion1' => $data['prix_suggestion1'],
                'prix_suggestion2' => $data['prix_suggestion2'],
                'type_cout_id' => $coutId->id,
                'etat_id' => $etatId->id,
                'niveau_id' => $niveauId->id,
                'transaction_id' => $transId->id,
                // 'type_produit_id' => $typeProdId->id,
                // 'localisation_id' => $data['localisation_id']
            ]);
            for($i = 0; $i < $request->count; $i++) {
                $this->validate($request, [
                    "image$i" => 'required|image',
                ]);
                $files = $request->file("image$i");
                $destinationPath = public_path('prod_img/');
                $profileImage = date("YmdHis$i") . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $check = Media::create([
                    'src' => env('APP_URL') . "/public/prod_img/$profileImage",
                    'source_id' => $insert->id,
                    'source' => 'produit'
                ]);
            }
            return $this->sendSuccess("Produit crée avvec succès !");
        }
        else {
            $catId = Categorie::where('nom', $data['categorie'])->first();
            $coutId = TypeCout::where('nom', $data['type_cout'])->first();
            $etatId = Etat::where('nom', $data['type_produit'])->first();
            $niveauId = Niveau::where('libelle', $data['niveau'])->first();
            $transId = Transaction::where('nom', $data['transaction'])->first();
            // $typeProdId = TypeProduit::where('nom', $data['type_produit'])->first();
            $insert = $this->products->create([
                'nom' => $data['nom'],
                'sous_titre' => $data['sous_titre'],
                'description' => $data['description'],
                'categorie_id' => $catId->id,
                'prix' => $data['prix_vente'],
                'prix_reduction' => $data['prix_reduction'],
                'commission' => $data['commission'],
                'prix_suggestion1' => $data['prix_suggestion1'],
                'prix_suggestion2' => $data['prix_suggestion2'],
                'type_cout_id' => $coutId->id,
                'etat_id' => $etatId->id,
                'niveau_id' => $niveauId->id,
                'transaction_id' => $transId->id,
                // 'type_produit_id' => $typeProdId->id,
                // 'localisation_id' => $data['localisation_id']
            ]);
            for($i = 0; $i < $request->count; $i++) {
                $this->validate($request, [
                    "image$i" => 'required|image',
                ]);
                $files = $request->file("image$i");
                $destinationPath = public_path('prod_img/');
                $profileImage = date("YmdHis$i") . "." . $files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $check = Media::create([
                    'src' => env('APP_URL') . "/public/prod_img/$profileImage",
                    'source_id' => $insert->id,
                ]);
            }
            return $this->sendSuccess("Produit crée avvec succès !");
        }
    }
    
    /**
     * getProduitsVendu
     *
     * @return void
     */
    public function getProduitsVendu()
    {
        try {
            $produits = $this->products->latest()->where('etat_id', 1)->get();
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
            return $this->sendResponse($collection, 'Liste des produits vendu');
        } catch(\Exception $e){
            return $this->sendError('Erreur de récupération des produits' . $e);
        }
    }
    
    /**
     * getProduitsIndisponible
     *
     * @return void
     */
    public function getProduitsIndisponible()
    {
        try {
            $produits = $this->products->latest()->where('etat_id', 2)->get();
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
            return $this->sendResponse($collection, 'Liste des produits indisponibles');
        } catch(\Exception $e){
            return $this->sendError('Erreur de récupération des produits' . $e);
        }
    }

    public function getProduitsInvisible()
    {
        try {
            $produits = $this->products->latest()->where('etat_id', 3)->get();
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
            return $this->sendResponse($collection, 'Liste des produits indisponibles');
        } catch(\Exception $e){
            return $this->sendError('Erreur de récupération des produits' . $e);
        }
    }
    
    /**
     * deleteProduit
     *
     * @param  mixed $id
     * @return void
     */
    public function deleteProduit($id)
    {
        $this->products->delete($id);
        return $this->sendSuccess('Produit supprimé !');
    }
    
    /**
     * searchProduit
     *
     * @param  mixed $product
     * @return void
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
}
