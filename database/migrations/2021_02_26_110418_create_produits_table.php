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
            $table->string('description', 255)->nullable();
            $table->unsignedInteger('commende_id')->index()->nullable();
            $table->unsignedInteger('categorie_id')->index()->nullable();
            $table->unsignedInteger('cout_id')->index()->nullable();
            $table->unsignedInteger('etat_id')->index()->nullable();
            $table->unsignedInteger('transaction_id')->index()->nullable();
            $table->unsignedInteger('niveau_id')->index()->nullable();
            $table->unsignedInteger('livraison_id')->index()->nullable();
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
        Schema::dropIfExists('produits');
    }
}
