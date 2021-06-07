<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('cover_url')->nullable();
            $table->text('images')->nullable();
            $table->string('condition')->nullable();
            $table->text('description')->nullable();
            $table->string('wholesale_price')->nullable();
            $table->string('old_wholesale_price')->nullable();
            $table->string('commission')->nullable();
            $table->string('min_suggestion_price')->nullable();
            $table->string('max_suggestion_price')->nullable();
            $table->string('delivery_price')->nullable();
            $table->string('abj_delivery_price')->nullable();
            $table->boolean('is_soldout')->nullable();
            $table->boolean('is_unavailable')->nullable();
            $table->string('location')->nullable();
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
        Schema::drop('products');
    }
}
