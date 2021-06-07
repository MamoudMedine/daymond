<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 255)->nullable();
            $table->string('sous_titre', 255)->nullable();
            // $table->string('main_photo')->nullable();
            // $table->string('photo1')->nullable();
            // $table->string('photo2')->nullable();
            // $table->string('photo3')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('categorie_id')->index()->nullable();
            $table->unsignedInteger('sous_categorie_id')->index()->nullable();
            // $table->unsignedInteger('cout_id')->index()->nullable();
            $table->string('nombre_vues')->default(0);
            $table->string('nombre_copies')->default(0);
            $table->string('nombre_telechargements')->default(0);
            $table->string('prix', 25)->nullable();
            $table->integer('quantite')->nullable();
            $table->string('prix_reduction', 25)->nullable();
            $table->string('commission', 25)->nullable();
            $table->string('prix_suggestion1', 25)->nullable();
            $table->string('prix_suggestion2', 25)->nullable();
            $table->integer('etoile')->default(0);
            $table->unsignedInteger('type_cout_id')->index()->nullable();
            $table->unsignedInteger('etat_id')->index()->default(1);
            $table->unsignedInteger('transaction_id')->index()->nullable();
            $table->unsignedInteger('niveau_id')->index()->nullable();
            $table->unsignedInteger('type_produit_id')->index()->nullable();
            // $table->unsignedInteger('type_produit_id')->index()->nullable();
            // $table->unsignedInteger('livraison_id')->index()->nullable();
            $table->unsignedInteger('localisation_id')->index()->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
