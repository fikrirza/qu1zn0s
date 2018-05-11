<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('st_purchase_order', function (Blueprint $table) {
            $table->increments('id');
            // ID Supplier
            $table->integer('supplier_id')->unsigned();
            // ID Warehouse yg beli
            $table->integer('warehouse_id')->unsigned();
            // ID Warehouse tujuan
            $table->integer('deliver_to')->unsigned();
            $table->string('po_number');
            $table->date('po_date');
            $table->date('expected_delivery_date');
            $table->string('po_notes');
            $table->string('po_description');
            // Status -> DRAFT; ISSUED; CANCELLED; RECEIVED; BILLS;
            $table->string('po_status');
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
        Schema::dropIfExists('purchase_order');
    }
}
