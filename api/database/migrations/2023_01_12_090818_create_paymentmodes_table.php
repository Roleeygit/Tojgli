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
        Schema::create("payment_modes", function (Blueprint $table) 
        {
            $table->id("id");
            $table->string("payment_mode")->unique();
        });

        DB::table("payment_modes")->insert
        ([
            ["payment_mode" => "Kártya"],
            ["payment_mode" => "Készpénz"]
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("paymentmodes");
    }
};
