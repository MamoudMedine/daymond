<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_produit', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cart_id")->index()->nullable();
            $table->unsignedBigInteger("produit_id")->index()->nullable();
            $table->string("quantite")->default(1);
            $table->string("montant")->default(0);
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
        Schema::dropIfExists('cart_produits');
    }
}
