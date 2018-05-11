<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('st_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('item_category')->unsigned();
            $table->string('item_name');
            $table->string('item_sku');
            $table->string('item_unit')->nullable();
            $table->string('item_unit_price')->nullable();
            $table->string('item_description')->nullable();
            $table->string('item_min_stock');
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
        Schema::dropIfExists('product');
    }
}
