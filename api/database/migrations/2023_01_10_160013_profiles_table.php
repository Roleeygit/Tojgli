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
            $table->foreignId('order_id');
            $table->foreignId('payment_id');
            $table->foreignId('delivery_id');
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
