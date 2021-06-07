<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faqs = [
            "Comment fonctionne l'offre DAYMOND" => "
            1. Après votre inscription sélectionnez un produit puis télécharger les images avec l'icône télécharger et copier les caractéristiques du produit avec l'icône copie.
            2. Ajouter un intérêt sur le prix grossiste de chez daymond déjà affiché, puis trouver un intéressé en utilisant les images téléchargées et les caractéristiques du produit copier depuis l'application daymond distribution. Ensuite présenter les à vos proches vos amis vos collègue et aussi sur les plateformes comme Facebook, Instagram, WhatsApp, Messenger, daymond boutique, les sites de ventes et d’autres moyens de communication.
            3. Dès obtention d'un client intéressé par le produit, revenez sur l'application daymond distribution puis sélectionner le produit et cliquez sur le Bouton « Je passe la commande » ensuite suivez les instructions en remplissant le formulaire de commande pour confirmer votre commande.
            4. Dès la confirmation de votre commande, l’agence DAYMOND se charge de contacter votre client puis livre ou expédie le produit au client.
            5. Vous recevrez, ensuite de l’agence daymond la suivie de votre commande avec les optons Suivantes : Commende en cours, commande annulée, commende validée
                • Une fois votre commande reçue par l’agence daymond, vous recevrez une notification Commande en cours.
                • Au cas où votre commande est annulée par le client ou par l'agence daymond vous recevrez une notification Commande annulée avec les motifs de l'annulation de votre commande.
                • En cas de commande validée, vous recevrez les détails du marché avec la mention de votre commission et suivez les instructions pour être rémunéré
            ",
            "Que signifie les 7 Etoiles de DAYMOND" => "

            ",
            "Comment être rémunéré" => "/",
        ];

        foreach ($faqs as $question => $reponse) {
            FAQ::create(['question' => $question, 'reponse' => $reponse]);
        }
    }
}
