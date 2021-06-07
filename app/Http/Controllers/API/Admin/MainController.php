<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cout;
use App\Models\Media;
use App\Models\Produit;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function new_vente(Request $request)
    {
        // PRODUIT
        $nom = $request->nom;
        $sous_titre = $request->sous_titre;
        $description = $request->description;
        // CATEGORIE
        $categorie = $request->categorie; // ID DE LA CATEGORIE
        // ETAT
        $etat = $request->etat; // ID DE L'ETAT'
        // TRANSACTION
        $transaction = $request->transaction; // ID DE LA TRANSACTION
        // Localisation
        $localisation = $request->localisation; // ID DE LA LOCALISATION
        // Niveau
        $niveau = $request->niveau; // ID DU NIVEAU
        // COUT
        $type_cout = $request->type_cout; // ID TYPE COUT
        $prix = $request->prix;
        $prix_reduction = $request->prix_reduction;
        $commission = $request->commission;
        $prix_suggestion1 = $request->prix_suggestion1;
        $prix_suggestion2 = $request->prix_suggestion2;
        // PAYS
        $pays = $request->pays; // IDS PAYS SELECTIONNER
        // MEDIAS
        $medias = $request->medias; // FICHIERS
        // LIVRAISON
        $livraison_id = $request->livraison_id; // ID LIEU LIVRAISON
        try {
          $cout = Cout::create([
              'prix' => $prix,
              'prix_reduction' => $prix_reduction,
              'commission' => $commission,
              'prix_suggestion1' => $prix_suggestion1,
              'prix_suggestion2' => $prix_suggestion2,
              'type_cout_id' => $type_cout,
          ]);
          $produit = Produit::create([
             'nom' => $nom,
             'sous_titre' => $sous_titre,
             'description' => $description,
             'categorie_id' => $categorie,
             'cout_id' => $cout->id,
             'etat_id' => $etat,
             'transaction_id' => $transaction,
             'niveau_id' => $niveau,
             'livraison_id' => $livraison_id,
             'localisation_id' => $localisation,
          ]);
          $produit->pays()->attached($pays);
          for ($cpt = 0; $cpt < count($medias) ; $cpt++){
              $media_name = 'media_'.date('dmYHis').$request->file('medias')[$cpt]->getClientOriginalExtension();
              $media = Media::create([
                  'nom' => $media_name,
                  'produit_id' => $produit->id,
              ]);
              $request->file('medias')[$cpt]->move(public_path('uploads/medias/'), $media_name);
          }
          return response()->json(['success' => true]);
        }catch(\Exception $e){
           return response()->json(['success' => false]);
        }
    }
}
