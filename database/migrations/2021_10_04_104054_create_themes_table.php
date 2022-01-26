<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('header');
            $table->bigInteger('slider_title');
            $table->string('siteColorTheme');
            $table->string('economy');
            $table->string('agenda');
            $table->string('politics');
            $table->string('sport');
            $table->bigInteger('apps');
            $table->bigInteger('subscription');
            $table->bigInteger('category1');
            $table->bigInteger('category2');
            $table->bigInteger('category3');
            $table->bigInteger('category4');
            $table->string('multiple_category');
            $table->bigInteger('fotogaleri');
            $table->bigInteger('videogaleri');




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
        Schema::dropIfExists('themes');
    }
}
