<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVhOrdAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('vh_ord_addresses', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->foreign('user_id')->references('id')->on('vh_users');

            $table->string('type')->nullable();

            $table->string('business_name')->nullable();

            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->string('address_one')->nullable();

            $table->string('address_two')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country')->nullable();

            $table->string('postal_code')->nullable();

            $table->string('taxation_label')->nullable();
            $table->string('taxation_number')->nullable();

            $table->string('business_identification_label')->nullable();
            $table->string('business_identification_number')->nullable();

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
        Schema::dropIfExists('vh_ord_addresses');
    }
}
