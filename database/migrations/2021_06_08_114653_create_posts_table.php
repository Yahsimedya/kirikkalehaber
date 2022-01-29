<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('subdistrict_id')->nullable();
            $table->integer('user_id')->default(1);
            $table->string('title_tr')->nullable();
            $table->string('title_en')->nullable();
            $table->string('subtitle_tr')->nullable();
            $table->string('subtitle_en')->nullable();
            $table->string('image')->nullable();
            $table->text('details_tr')->nullable();
            $table->text('details_en')->nullable();
            $table->text('tags_tr')->nullable();
            $table->text('tags_en')->nullable();
            $table->text('keywords_tr')->nullable();
            $table->text('description_tr')->nullable();
            $table->text('keywords_en')->nullable();
            $table->text('description_en')->nullable();
            $table->integer('manset')->nullable();
            $table->boolean('story')->default(0);
            $table->integer('headline')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('surmanset')->nullable();
            $table->string('haber_iha_kod')->unique()->nullable();
            $table->integer('headlinetag')->nullable();
            $table->integer('flahtag')->nullable();
            $table->integer('attentiontag')->nullable();

            $table->integer('surmanset_photo')->nullable();
            $table->integer('bigthumbnail')->nullable();
            $table->string('post_date')->nullable();
            $table->string('post_month')->nullable();
            $table->string('status')->nullable();
            $table->string('posts_video')->nullable();
            $table->string('slug_tr')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('publish_date')->nullable();

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
        Schema::dropIfExists('posts');
    }
}
