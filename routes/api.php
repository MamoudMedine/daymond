<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// API ADMIN
Route::group(['prefix' => 'v1/admin'], function () {
    // LOGIN
    Route::post('/login', 'Auth\Admin\LoginController@login');
    Route::post('/confirmation', 'Auth\Admin\LoginController@confirmation');
    Route::get('/get_icon', 'Admin\HomeController@getIcon');
    Route::group(['middleware' => 'auth:api_admin', 'scopes:admin'], function () {
        // Produit
        Route::get('/get_produits', 'Admin\ProduitController@getProduits');
        Route::post('/create_vente', 'Admin\ProduitController@createCommande');
        Route::get('/get_produits_vendu', 'Admin\ProduitController@getProduitsVendu');
        Route::get('/get_produits_indisponible', 'Admin\ProduitController@getProduitsIndisponible');
        Route::get('/get_produits_invisible', 'Admin\ProduitController@getProduitsInvisible');
        Route::get('/delete_produit/{id_produit}', 'Admin\ProduitController@deleteProduit');
        Route::get('/search_produit/{product}', 'Admin\ProduitController@searchProduit');

        // Categorie
        Route::get('/get_categories', 'Admin\CategorieController@getCategories');
        Route::post('/add_categorie', 'Admin\CategorieController@newCategorie');

        // Etat
        Route::get('/get_etat', 'Admin\EtatController@getEtat');
        Route::post('/add_etat', 'Admin\EtatController@newEtat');
        Route::post('/add_transaction', 'Admin\TransactionController@newTransaction');
        Route::post('/add_devise', 'Admin\DeviseController@new_devise'); // Not use
        Route::post('/del_devise', 'Admin\DeviseController@remove_devise'); // Not use
        Route::get('/get_niveau', 'Admin\NiveauController@getNiveau');
        Route::get('/get_localisation', 'Admin\LocalisationController@getLocalisation');
        Route::post('/add_localisation', 'Admin\LocalisationController@newLocalisation');

        // Pays
        Route::get('/get_pays', 'Admin\PaysController@getPays');
        Route::post('/add_pays', 'Admin\PaysController@newPays');

        // Type cout
        Route::get('/get_prix', 'Admin\TypeCoutController@getPrix');
        Route::post('/add_prix', 'Admin\TypeCoutController@newPrix');

        // Notification
        Route::get('/get_notification', 'Admin\NotificationController@getNotifications');
        Route::post('/create_notification', 'Admin\NotificationController@createNotification');
        Route::post('/del_notification', 'Admin\NotificationController@delNotification');
        Route::post('/update_notification', 'Admin\NotificationController@updateNotification');

        // Diffusion
        Route::get('/get_diffusions', 'Admin\DiffusionController@getDiffusions');
        Route::post('/create_diffusion', 'Admin\DiffusionController@createDiffusion');
        Route::post('/del_diffusion', 'Admin\DiffusionController@delDiffusion');
        Route::post('/update_diffusion', 'Admin\DiffusionController@updateDiffusion');

        // Commande
        Route::get('/count_new_commande', 'Admin\CommandeController@countNewCommande');
        Route::get('/count_commande_en_cours', 'Admin\CommandeController@countCommandeEnCours');
        Route::get('/count_commande_validee', 'Admin\CommandeController@countCommandeValidee');
        Route::get('/count_commande_annulee', 'Admin\CommandeController@countCommandeAnnulee');
        Route::get('/get_new_commande', 'Admin\CommandeController@getNewCommande');
        Route::get('/get_commande_en_cours', 'Admin\CommandeController@getCommandeEnCours');
        Route::get('/get_commande_validee', 'Admin\CommandeController@getCommandeValidee');
        Route::get('/get_commande_annulee', 'Admin\CommandeController@getCommandeAnnulee');
        Route::get('/delete_commande/{id_commande}', 'Admin\CommandeController@deleteCommande');
        Route::get('/delete_commande_by_product/{id_product}', 'Admin\CommandeController@deleteCommandeByProduct');
        Route::get('/delete_commande_epingle_by_product/{id_product}', 'Admin\CommandeController@deleteCommandeEpingleByProduct');
        Route::get('/delete_commande_rappel_by_product/{id_product}', 'Admin\CommandeController@deleteCommandeRappelByProduct');
        Route::post('/add_commande_epingle', 'Admin\CommandeController@commandeEpingle');
        Route::get('/get_commande_epingle', 'Admin\CommandeController@getCommandeEpingle');
        Route::post('/add_commande_rappel', 'Admin\CommandeController@commandeRappel');
        Route::get('/get_rappel', 'Admin\CommandeController@getRappel');
        Route::post('/update_commande_state', 'Admin\CommandeController@changeCommandeState');
        Route::post('/paiement', 'Admin\CommandeController@Paiement');
        Route::get('/get_commande_validee_where_payment_is_not_do', 'Admin\CommandeController@getCommandeValideeWherePaymentIsNotDo');
        Route::get('/get_commande_validee_where_payment_is_do', 'Admin\CommandeController@getCommandeValideeWherePaymentIsDo');
        
        // Autres
        Route::post('/change_icon', 'Admin\HomeController@changeIcon');
        Route::get('/del_icon', 'Admin\HomeController@deleteIcon');
        Route::get('/get_banner', 'Admin\HomeController@getBanner');
        Route::post('/change_banner', 'Admin\HomeController@changeBanner');
        Route::get('/del_banner', 'Admin\HomeController@deleteBanner');
        Route::post('/add_user', 'Admin\HomeController@addUser');
        Route::get('/get_abonne', 'Admin\HomeController@getAbonne');
        Route::post('/update_account', 'Admin\HomeController@updateAccount');
        Route::get('/profile', 'Admin\HomeController@adminProfile');

        Route::get('/get_type_diffusion', 'Admin\TypeDiffusionController@getTypeDiffusion');
        Route::get('/get_admin', 'Admin\AdminController@getAdmin');
        Route::get('/get_transaction', 'Admin\TransactionController@getTransaction');
    });
});


// API UTILISATEUR
Route::group(['prefix' => 'v1/utilisateur'], function () {
    Route::post('/login', 'Auth\Utilisateur\LoginController@login');
    Route::post('/create', 'Auth\Utilisateur\RegisterController@create');
    Route::post('/confirmation', 'Auth\Utilisateur\RegisterController@confirmation');
    Route::get('/get_icon', 'Utilisateur\HomeController@getIcon');
    Route::group(['middleware' => 'auth:api_user', 'scopes:utilisateur'], function () {
        // Profile
        Route::get('/profile', 'Utilisateur\EditController@userProfile');
        Route::post('/update_account', 'Utilisateur\EditController@updateAccount');

        // Commande
        Route::post('/create_commande', 'Utilisateur\CommandeController@create');
        Route::get('/get_commandes/{utilisateur_id}', 'Utilisateur\CommandeController@getCommandes'); // Not use
        Route::get('/get_commande/{cmd_id}', 'Utilisateur\CommandeController@getCommande'); // Not use
        Route::post('/del_commande', 'Utilisateur\CommandeController@deleteCommande');

        // Notification
        Route::get('/get_notifications/{utilisateur_id}', 'Utilisateur\NotificationController@getNotifications');
        Route::get('/get_notification/{notification_id}', 'Utilisateur\NotificationController@getNotification'); // Not use
        Route::post('/del_notification', 'Utilisateur\NotificationController@delNotification');
        Route::get('/get_diffusions', 'Utilisateur\DiffusionController@getDiffusions');

        // Cart
        Route::get('/get_cart/{userId}', 'Utilisateur\HomeController@getCart');
        Route::post('/add_cart', 'Utilisateur\HomeController@addToCart');

        // Produit
        Route::get('/get_produits', 'Utilisateur\ProduitController@getProduits');
        Route::get('/get_vente_flash_product', 'Utilisateur\ProduitController@getVenteFlashProduct');
        Route::get('/get_recent_product', 'Utilisateur\ProduitController@getRecentProduct');
        Route::get('/search_produit/{product}', 'Utilisateur\ProduitController@searchProduit');
        Route::get('/get_produits_by_categorie/{categorie}/{isSousCategorie}', 'Utilisateur\ProduitController@getProduitsByCategorie');

        // AUTRE
        Route::get('/get_banner', 'Utilisateur\HomeController@getBanner');
        Route::post('/add_historique', 'Utilisateur\HomeController@addHistorique');
        Route::post('/delete_historique', 'Utilisateur\HomeController@removeHistorique');
        Route::get('/get_categories', 'Utilisateur\CategorieController@getCategories');
        Route::post('/send_phone', 'Utilisateur\HomeController@sendPhone');
    });
});