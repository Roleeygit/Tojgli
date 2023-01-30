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
        Schema::create("delivery_modes", function (Blueprint $table) 
        {
            $table->id("id");
            $table->string("delivery_mode")->unique();
        });

        DB::table("delivery_modes")->insert
        ([
            ["delivery_mode" => "Házhozszállítás"],
            ["delivery_mode" => "Postai átvétel"]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("deliverymodes");
    }
};
