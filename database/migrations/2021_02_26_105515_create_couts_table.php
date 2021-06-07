<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('couts', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('prix', 25)->nullable();
        //     $table->string('prix_reduction', 25)->nullable();
        //     $table->string('commission', 25)->nullable();
        //     $table->string('prix_suggestion1', 25)->nullable();
        //     $table->string('prix_suggestion2', 25)->nullable();
        //     $table->unsignedInteger('type_cout_id')->index()->nullable();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('couts');
    }
}
