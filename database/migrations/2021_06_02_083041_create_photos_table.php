<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('title');
            $table->string('type')->default(0);
            $table->string('photocategory_id')->nullable();
            $table->integer('status')->default(0);
            $table->string('keywords_tr')->nullable();
            $table->string('description_tr')->nullable();
            $table->string('keywords_en')->nullable();
            $table->text('photo_text')->nullable();

            $table->string('description_en')->nullable();
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
        Schema::dropIfExists('photos');
    }
}
