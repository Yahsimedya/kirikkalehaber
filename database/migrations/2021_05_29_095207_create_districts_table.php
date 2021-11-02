<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->string('district_en');
            $table->string('district_tr');
            $table->string('district_keywords')->nullable();
            $table->string('district_description')->nullable();
            $table->string('district_icon')->nullable();
            $table->string('slug')->nullable();
            $table->string('district_status')->nullable()->default(1);
            $table->string('district_order')->nullable();
            $table->string('soft_delete')->nullable()->default(0); // boş bırakılabilir değeri otomatik 0 atar
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
        Schema::dropIfExists('districts');
    }
}
