<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogues', function (Blueprint $table) {
        // public string gameID;
        // public uint ranking;
        // public uint win;
        // public uint lose;

            $table->id('gameID');
            $table->unsignedInteger('ranking');
            $table->unsignedInteger('win');
            $table->unsignedInteger('lose');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            //Create a forein key for catalogue with users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogues');
    }
}
