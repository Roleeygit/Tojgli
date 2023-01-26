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
            $table->string('surname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->date('order_date')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('payment_mode_id')->nullable();
            $table->foreignId('delivery_mode_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
