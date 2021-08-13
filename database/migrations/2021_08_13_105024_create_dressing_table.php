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
        Schema::create('dressing', function (Blueprint $table) {
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
            $table->unsignedTinyInteger('gender')->default(0);
            $table->unsignedTinyInteger('hairStyle')->default(3);
            $table->unsignedTinyInteger('hairColor')->default(7);
            $table->unsignedTinyInteger('eyeStyle')->default(2);
            $table->unsignedTinyInteger('skinStyle')->default(0);
            $table->unsignedTinyInteger('glassesStyle')->default(0);
            $table->unsignedTinyInteger('glassesColor')->default(0);
            $table->unsignedTinyInteger('chestStyle')->default(0);
            $table->unsignedTinyInteger('chestColor')->default(17);
            $table->unsignedTinyInteger('legStyle')->default(2);
            $table->unsignedTinyInteger('legColor')->default(0);
            $table->unsignedTinyInteger('feetStyle')->default(2);
            $table->unsignedTinyInteger('feetColor')->default(23);
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
        Schema::dropIfExists('dressing');
    }
}
