<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('subcategory_en');
            $table->string('subcategory_tr');
            $table->string('subcategory_keywords')->nullable();
            $table->string('subcategory_description')->nullable();
            $table->string('subcategory_status')->nullable()->default(1);
            $table->string('subcategory_order')->nullable();
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
        Schema::dropIfExists('subcategories');
    }
}
