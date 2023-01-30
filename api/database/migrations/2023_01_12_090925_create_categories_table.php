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
        Schema::create("categories", function (Blueprint $table) {
            $table->id("id");
            $table->string("category");
        });

        DB::table("categories")->insert
        ([
            ["category" => "Csirke Tojás"],
            ["category" => "Strucc Tojás"],
            ["category" => "Kitalált Tojás"],
            ["category" => "Lúd Tojás"],
            ["category" => "Valamilyen Tojás"]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists("categories");
    }
};
