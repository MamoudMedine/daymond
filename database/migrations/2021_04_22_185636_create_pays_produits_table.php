<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays_produits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pays_id')->nullable()->index();
            $table->unsignedBigInteger('produit_id')->nullable()->index();
            $table->unsignedInteger('etat_id')->index()->nullable();
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
        Schema::dropIfExists('pays_produits');
    }
}
