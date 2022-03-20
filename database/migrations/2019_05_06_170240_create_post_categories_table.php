<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(true);
            $table->integer('sequence');
            $table->string('name');
            $table->string('slug', 150)->unique();
            $table->timestamps();
        });

        Schema::create('post_post_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('post_category_id');
            $table->unsignedBigInteger('post_id');

            $table->unique(['post_category_id', 'post_id']);
            $table->foreign('post_category_id')
                ->references('id')->on('post_categories')
                ->onDelete('cascade');
            $table->foreign('post_id')
                ->references('id')->on('posts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_post_category');
        Schema::dropIfExists('post_categories');
    }
}
