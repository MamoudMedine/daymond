<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateurs', function (Blueprint $table) {
            $table->id();

            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('profession')->nullable();
            $table->string('contact', 25)->nullable();
            $table->string('contact_mobile_money', 25)->nullable();
            $table->longText('password')->nullable();
            $table->longText('photo')->nullable();
            $table->integer('statut')->default(1);
            $table->integer('etoile')->default(0);
            $table->integer('etoile_plus')->default(0);
            $table->unsignedInteger('user_id')->index()->nullable();
            $table->unsignedInteger('adresse_id')->index()->nullable();
            $table->unsignedBigInteger('pays_id')->index()->default(1);
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
        Schema::dropIfExists('utilisateurs');
    }
}
