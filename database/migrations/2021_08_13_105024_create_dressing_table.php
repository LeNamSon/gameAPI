<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDressingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dressings', function (Blueprint $table) {
        // public byte gender = 0;
        // public byte hairStyle = 3;
        // public byte hairColor = 7;
        // public byte eyeStyle = 2;
        // public byte skinStyle = 0;
        // public byte glassesStyle = 0;
        // public byte glassesColor = 0;
        // public byte chestStyle = 0;
        // public byte chestColor = 17;
        // public byte legStyle = 2;
        // public byte legColor = 0;
        // public byte feetStyle = 0;
        // public byte feetColor = 23;

            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('gender')->nullable();
            $table->unsignedTinyInteger('hairStyle')->nullable();
            $table->unsignedTinyInteger('hairColor')->nullable();
            $table->unsignedTinyInteger('eyeStyle')->nullable();
            $table->unsignedTinyInteger('skinStyle')->nullable();
            $table->unsignedTinyInteger('glassesStyle')->nullable();
            $table->unsignedTinyInteger('glassesColor')->nullable();
            $table->unsignedTinyInteger('chestStyle')->nullable();
            $table->unsignedTinyInteger('chestColor')->nullable();
            $table->unsignedTinyInteger('legStyle')->nullable();
            $table->unsignedTinyInteger('legColor')->nullable();
            $table->unsignedTinyInteger('feetStyle')->nullable();
            $table->unsignedTinyInteger('feetColor')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('dressings');
    }
}
