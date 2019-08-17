<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVhOrdOrderPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('vh_ord_order_payments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('vh_ord_order_id')->nullable()->unsigned()->nullable();
            $table->foreign('vh_ord_order_id')->references('id')->on('vh_ord_orders');

            $table->integer('vh_ord_payment_id')->nullable()->unsigned()->nullable();
            $table->foreign('vh_ord_payment_id')->references('id')->on('vh_ord_payments');


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
        Schema::dropIfExists('vh_ord_order_payments');
    }
}
