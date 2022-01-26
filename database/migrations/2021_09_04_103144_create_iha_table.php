<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIhaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iha', function (Blueprint $table) {
            $table->id();
            $table->string('iha_username');
            $table->string('iha_usercode');
            $table->string('iha_password');
            $table->string('iha_rss');
            $table->boolean('auto_Bot')->default(0);
            $table->integer('district')->default(0);
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
        Schema::dropIfExists('iha');
    }
}
