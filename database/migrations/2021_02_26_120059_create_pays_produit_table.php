<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays_produit', function (Blueprint $table) {
            $table->primary(['pays_id', 'produit_id']);
            $table->unsignedInteger('pays_id')->index()->nullable();
            $table->unsignedInteger('produit_id')->index()->nullable();
            $table->timestamps();
            $table->foreign('pays_id')->references('id')->on('pays')->onDelete('cascade');
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
        Schema::dropIfExists('pays_produit');
    }
}
