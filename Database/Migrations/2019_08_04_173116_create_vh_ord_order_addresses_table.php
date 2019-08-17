<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVhOrdOrderAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('vh_ord_order_addresses', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('vh_ord_order_id')->nullable()->unsigned()->nullable();
            $table->foreign('vh_ord_order_id')->references('id')->on('vh_ord_orders');

            $table->integer('vh_ord_address_id')->nullable()->unsigned()->nullable();
            $table->foreign('vh_ord_address_id')->references('id')->on('vh_ord_addresses');

            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('vh_ord_order_addresses');
    }
}
