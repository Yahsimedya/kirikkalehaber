<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vakitlers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vakitlers', function (Blueprint $table) {
            $table->id();
            $table->string('imsak')->nullable();
            $table->string('gunes')->nullable();
            $table->string('ogle')->nullable();
            $table->string('ikindi')->nullable();
            $table->string('aksam')->nullable();
            $table->string('yatsi')->nullable();
            $table->string('tarih');
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
        //
        Schema::dropIfExists('vakitlers');

    }
}
