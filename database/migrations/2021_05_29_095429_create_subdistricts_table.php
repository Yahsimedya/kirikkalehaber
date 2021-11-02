<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubdistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subdistricts', function (Blueprint $table) {
            $table->id();
            $table->string('district_id');
            $table->string('subdistrict_en');
            $table->string('subdistrict_tr');
            $table->string('subdistrict_keywords')->nullable();
            $table->string('subdistrict_description')->nullable();
            $table->string('subdistrict_status')->nullable()->default(1);
            $table->string('subdistrict_order')->nullable();
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
        Schema::dropIfExists('subdistricts');
    }
}
