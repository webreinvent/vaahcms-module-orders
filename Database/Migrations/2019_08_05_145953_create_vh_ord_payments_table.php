<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVhOrdPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('vh_ord_payments', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('vh_ord_order_id')->nullable()->unsigned()->nullable();
            $table->foreign('vh_ord_order_id')->references('id')->on('vh_ord_orders');

            $table->uuid('uuid')->nullable();

            $table->string('type')->nullable();
            $table->string('currency')->nullable();


            $table->string('payment_method')->nullable();
            $table->integer('payment_attempts')->nullable();
            $table->dateTime('last_payment_attempt_at')->nullable();
            $table->string('status')->nullable();

            $table->float('amount')->nullable();
            $table->float('paid_amount')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('payment_url')->nullable();
            $table->dateTime('payment_date_time')->nullable();

            $table->text('meta')->nullable();
            $table->text('payment_meta')->nullable();

            $table->integer('created_by')->nullable()->unsigned()->nullable();
            $table->foreign('created_by')->references('id')->on('vh_users');

            $table->integer('modified_by')->nullable()->unsigned()->nullable();
            $table->foreign('modified_by')->references('id')->on('vh_users');

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
        Schema::dropIfExists('vh_ord_payments');
    }
}
