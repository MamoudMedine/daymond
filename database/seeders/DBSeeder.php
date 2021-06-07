<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Etat;
use App\Models\Pays;
use App\Models\User;
use App\Models\Admin;
use App\Models\Media;
use App\Models\Niveau;
use App\Models\Adresse;
use App\Models\Product;
use App\Models\Produit;
use TypeDiffusionSeeder;
use App\Models\Categorie;
use App\Models\Livraison;
use App\Models\Transaction;
use App\Models\TypeProduit;
use App\Models\Utilisateur;
use App\Models\Localisation;
use App\Models\SousCategorie;
use App\Models\TypeDiffusion;
use App\Models\TypeCommande;
use App\Models\TypeCout;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DBSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Product::factory(20)->create();
        $users = [
            [
                'name' => "Amane Hosanna",
                'email' => "amanehosanna@gmail.com",
                'contact' => "22574936826",
                'password' => Hash::make('password'),
            ],
        ];
        $admins = [
            [
                'name' => "John Admin",
                'email' => "john@lark.com",
                'contact' => "22574936826",
                'is_admin' => true,
                'password' => Hash::make('password'),
            ],
            [
                'name' => "Régie Daymond",
                'email' => "regie@daymond.com",
                'contact' => "22574936826",
                'is_admin' => true,
                'password' => Hash::make('password'),
            ],
            [
                'name' => "Régie de vente",
                'email' => "vente@daymond.com",
                'contact' => "22574936826",
                'is_admin' => true,
                'password' => Hash::make('password'),
            ],
            [
                'name' => "Info Daymond",
                'email' => "info@daymond.com",
                'contact' => "22574936826",
                'is_admin' => true,
                'password' => Hash::make('password'),
            ],
        ];
        //
        $utilisateurs = [
            [
                'nom' => "AMANE",
                'prenom' => "Hosanna",
                'profession' => "Software Engineer",
                'contact' => "22574936826",
                'password' => "password",
                'photo' => "",
                'statut' => 1,
                'user_id' => 1,
            ],
        ];

        User::insert($users);
        User::insert($admins);
        // Admin::insert($admins);
        Utilisateur::insert($utilisateurs);

        $addresses = [
            [
                'pays' => "CI",
                'ville' => "Abidjan",
            ],
            [
                'pays' => "SN",
                'ville' => "Dakar",
            ],
        ];

        Adresse::insert($addresses);

        $pays = [
            "Côte d'Ivoire",
            "Bénin",
            "Burkina Faso",
            "Burundi",
            "Cameroun",
            "Comores",
            "Djibouti",
            "Gabon",
            "Guinée",
            "Guinée équatoriale",
            "Madagascar",
            "Mali",
            "Niger",
            "République centrafricaine",
            "République démocratique du Congo",
            "République du Congo",
            "Rwanda",
            "Sénégal",
            "Seychelles",
            "Tchad",
            "Togo",
        ];
        foreach ($pays as $value) {
            Pays::create([
                'nom' => $value,
                'indicatif' => "",
                'code' => "",
                'flag' => asset("img/flags/$value.png"),
            ]);
        }

        $categories = [
            "ARTICLES DE SPORT" => [
                "Sport & Fitness",
                "Instruments & Accessoires de Sport",
                "Top marques",
            ],
            "JOUETS ET JEUX" => [
                "Jouets pour bébés",
                "Jeux de plein air",
                "Jeux de société",
                "Trotinettes & skateboards",
                "Jouets pour enfants",
                "Poupées & Peluches",
                "Jeux éducatifs",
                "Déguisement & Fêtes",
                "La grande Récré",
            ],

            "VOITURE" => [
                "Entretien de la voiture",
                "Motos et sports motorisés",
                "Pièces de rechange",
                "Electronique auto & Accessoires",
                "Feux & Accessoires d'éclairage",
                "Pièces & Accessoires de VR",
                "Peintures et fournitures",
                "Huiles & fluides",
                "Outils & équipements",
                "Accessoires intérieur",
                "Accessoires extérieur",
                "Top Marques Auto",
            ],

            "INSTRUMENTS DE MUSIQUE" => [

            ],

            "LIVRES, FILMS ET MUSIQUE" => [

            ],

            "ANIMALERIE" => [

            ],

            "JARDIN ET PLEIN AIR" => [

            ],

            "SERVICES" => [

            ],

            "MODE" => [
                "Mode Femme",
                "Jardin secret",
                "Uniformes de travail",
                "Bagage et sac de voyage",
                "Mode Homme",
                "Mode enfant",
                "Top marques",
                "Découvrez d'autres produits",
            ],

        ];

        foreach($categories as $categorie => $sous_categories){
            $cat = Categorie::create([
                'nom' => $categorie,
            ]);
            foreach($sous_categories as $sous_cat){
                SousCategorie::create([
                    'nom' => $sous_cat,
                    'categorie_id' => $cat->id,
                ]);
            }
        }


        $etats = [
            "Vendu",
            "Indisponible",
            "Invisible",
            "Stock épuisé",
            "Neuf",
            "Importé",
            "Second utilisation",
        ];

        foreach($etats as $c){
            Etat::create([
                'nom' => $c,
            ]);
        }


        $typeCommande = [
            "Nouvelle commande",
            "Commande en cours",
            "Commande validée",
            "Commande annulée"
        ];

        foreach($typeCommande as $c){
            TypeCommande::create([
                'nom' => $c,
            ]);
        }

        $type_produits = [
            "Nouveau",
            "Importé",
        ];
        foreach($type_produits as $item){
            TypeProduit::create([
                'nom' => $item,
            ]);
        }
        $transactions = [
            "Vente",
            "Location",
            "Service",
        ];
        foreach($transactions as $c){
            Transaction::create([
                'nom' => $c,
            ]);
        }
        $niveaux = [
            "Vente flash",
            "Plus recent",
        ];
        foreach($niveaux as $c){
            Niveau::create([
                'libelle' => $c,
            ]);
        }
        $type_diffusions = [
            "Article vendu",
            "Disponibilité du produit",
            "Info Daymond"
        ];
        foreach($type_diffusions as $c){
            TypeDiffusion::create([
                'nom' => $c,
            ]);
        }

        $localisation = [
            "Localisation 1",
            "Localisation 2",
            "Localisation 3",
        ];
        foreach($localisation as $c){
            Localisation::create([
                'nom' => $c,
            ]);
        }

        $cout = [
            "Prix",
            "Prix grossiste",
            "A louer",
        ];
        foreach($cout as $c){
            TypeCout::create([
                'nom' => $c,
            ]);
        }

        $faker = Factory::create();

        for ($i=0; $i < 16; $i++) {
            $data = [
                'nom' => $faker->name,
                'sous_titre' => $faker->sentence,
                'description' => $faker->paragraph,
                'categorie_id' => Categorie::all()->random()->first()->id,
                // 'cout_id' => $faker-> ,
                'prix' => $faker->randomNumber(5),
                'prix_reduction' => $faker->randomNumber(4),
                'commission' => $faker->randomNumber(3),
                'prix_suggestion1' => $faker->randomNumber(4),
                'prix_suggestion2' => $faker->randomNumber(4),
                // 'type_cout_id' => $faker-> ,
                'etat_id' => Etat::all()->random()->first()->id,
                'transaction_id' => Transaction::all()->random()->first()->id,
                'niveau_id' => Niveau::all()->random()->first()->id,
                //'livraison_id' => ,
                'localisation_id' => Localisation::all()->random()->first()->id,
            ];

            $prod = Produit::create($data);

            $media = [
                'source' => "produit",
                'source_id' => $prod->id,
                'src' => "https://picsum.photos/200/300",
            ];


            for ($j=0; $j < 4; $j++) {
                Media::create($media);
            }


            $livraison = [
                'produit_id' => $prod->id,
                'lieu' => $faker->address,
                'frais' => $faker->randomNumber(3)
            ];

            for ($j=0; $j < 2; $j++) {
                Livraison::create($livraison);
            }
        }

        $slideshow = [
            'source' => "slideshow",
            'src' => "https://picsum.photos/200/300",
        ];

        for ($i=0; $i < 3; $i++) {
            Media::create($slideshow);
        }

        // logo
        $logo = [
            'source' => "logo",
            'src' => url(asset('logo.png')),
        ];

        Media::create($logo);
    }
}
