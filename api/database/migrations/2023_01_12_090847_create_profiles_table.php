<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) 
        {
            $table->id();
            $table->string('surname');
            $table->string('lastname');
            $table->string('country');
            $table->string('city');
            $table->string('address');
            $table->foreignId('customer_id');
            $table->foreignId('order_date_id');
            $table->foreignId('payment_mode_id');
            $table->foreignId('delivery_mode_id');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('order_date_id')->references('id')->on('order_dates');
            $table->foreign('payment_mode_id')->references('id')->on('payment_modes');
            $table->foreign('delivery_mode_id')->references('id')->on('delivery_modes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
