<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVhOrdOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('vh_ord_orders', function (Blueprint $table) {
            $table->increments('id');

            $table->uuid('uuid')->nullable();

            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->foreign('user_id')->references('id')->on('vh_users');


            $table->integer('parent_vh_ord_order_id')->unsigned()->nullable();
            $table->foreign('parent_vh_ord_order_id')->references('id')->on('vh_ord_orders');

            $table->string('order_number')->nullable()->index();
            $table->date('order_date')->nullable()->nullable()->index();

            $table->string('status')->nullable()->index();

            $table->integer('reorder_vh_ord_order_id')->nullable();
            $table->string('order_payment_status')->nullable()->index();

            $table->dateTime('is_paid_at')->nullable();
            $table->dateTime('is_invoiced_at')->nullable();
            $table->dateTime('is_shipped_at')->nullable();
            $table->dateTime('is_delivered_at')->nullable();

            $table->string('currency')->nullable()->index();

            $table->float('sub_total')->nullable();
            $table->string('coupon_code')->nullable();
            $table->float('coupon_discounted_value')->nullable();
            $table->float('discount')->nullable();
            $table->float('tax')->nullable();
            $table->float('total')->nullable();
            $table->float('paid')->nullable();
            $table->float('balance')->nullable();

            $table->mediumText('staff_notes')->nullable();
            $table->mediumText('customer_notes')->nullable();

            $table->text('header_text')->nullable();
            $table->text('footer_text')->nullable();
            $table->text('meta')->nullable();

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
        Schema::dropIfExists('vh_ord_orders');
    }
}
