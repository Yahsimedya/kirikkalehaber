<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
//            $table->foreignId('parent_id')->nullable()->unsigned()->references('id')->on('categories')->onDelete('cascade');
            $table->string('category_en')->unique();
            $table->string('category_tr')->unique();
            $table->string('category_keywords')->nullable();
            $table->text('category_description')->nullable();
            $table->string('category_icon')->nullable();
            $table->boolean('category_status')->default(1);
            $table->integer('category_order')->default(0);
            $table->string('soft_delete')->nullable()->default(0); // boş bırakılabilir değeri otomatik 0 atar
            $table->string('categorycolor')->nullable(); // boş bırakılabilir değeri otomatik 0 atar

            $table->timestamps();
        });

        //Schema::table('categories', function (Blueprint $table) {
         //  $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
      //  });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
