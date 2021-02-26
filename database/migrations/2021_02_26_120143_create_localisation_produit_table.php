<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalisationProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('localisation_produit', function (Blueprint $table) {
            $table->primary(['localisation_id', 'produit_id']);
            $table->unsignedInteger('localisation_id')->index()->nullable();
            $table->unsignedInteger('produit_id')->index()->nullable();
            $table->timestamps();
            $table->foreign('localisation_id')->references('id')->on('localisations')->onDelete('cascade');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('localisation_produit');
    }
}
