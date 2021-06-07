<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite_produit')->nullable();
            $table->string('prix_vente', 25)->nullable();
            $table->string('autre_details', 250)->nullable();
            $table->string('date_livraison', 25)->nullable();
            $table->string('status')->nullable();
            $table->unsignedInteger('produit_id')->index()->nullable();
            $table->unsignedInteger('utilisateur_id')->index()->nullable();
            $table->unsignedInteger('client_id')->index()->nullable();
            // $table->timestamp('date')->nullable();
            $table->unsignedBigInteger('type_commande_id')->nullable();
            $table->foreign('type_commande_id')->references('id')->on('type_commande')->onDelete('cascade');
            $table->string('note')->nullable();
            $table->string('commission')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
