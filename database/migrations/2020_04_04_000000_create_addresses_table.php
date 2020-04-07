<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('deliveryAddress');
            $table->unsignedMediumInteger('postalCode');
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('users');
            $table->unsignedBigInteger('cityId');
            $table->foreign('cityId')->references('id')->on('cities');
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
        Schema::dropIfExists('addresses');
    }
}
