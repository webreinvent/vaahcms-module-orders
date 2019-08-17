<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVhOrdProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('vh_ord_products', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('vh_ord_order_id')->nullable()->unsigned()->nullable();
            $table->foreign('vh_ord_order_id')->references('id')->on('vh_ord_orders');

            $table->integer('productable_id')->nullable();
            $table->string('productable_type')->nullable();

            $table->string('sku')->nullable();
            $table->string('name')->nullable();
            $table->mediumText('details')->nullable();
            $table->float('price')->nullable();
            $table->float('quantity')->nullable();
            $table->float('total')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('tracking_url')->nullable();

            $table->integer('created_by')->nullable()->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('vh_users');

            $table->integer('updated_by')->nullable()->unsigned()->nullable();
            $table->foreign('updated_by')->references('id')->on('vh_users');

            $table->integer('deleted_by')->nullable()->unsigned()->nullable();
            $table->foreign('deleted_by')->references('id')->on('vh_users');

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
        Schema::dropIfExists('vh_ord_products');
    }
}
