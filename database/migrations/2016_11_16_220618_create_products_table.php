<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('nameFr');
            $table->string('nameEn');
            $table->text('descriptionFr');
            $table->text('descriptionEn');
            $table->integer('stock');
            $table->integer('price');
            $table->string('url');
            $table->unsignedInteger('shop_id');
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table){
            $table->foreign('shop_id')
                ->references('id')
                ->on('shops');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
