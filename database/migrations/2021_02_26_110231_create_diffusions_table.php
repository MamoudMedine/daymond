<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiffusionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diffusions', function (Blueprint $table) {
            $table->id();
            $table->string('date_vente', 25)->nullable();
            $table->string('texte', 255)->nullable();
            $table->integer('disponibilite')->default(0);
            $table->unsignedInteger('admin_id')->index()->nullable();
            $table->unsignedInteger('utilisateur_id')->index()->nullable();
            $table->unsignedInteger('type_diffusion_id')->index()->nullable();
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
        Schema::dropIfExists('diffusions');
    }
}
