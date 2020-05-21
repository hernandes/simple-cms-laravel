<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('page_id')->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->boolean('active');
            $table->unsignedInteger('order')->default(0);
            $table->nestedSet();
            $table->timestamps();

            $table->foreign('page_id')
                ->references('id')->on('pages')
                ->onDelete('cascade');

            $table->foreign('post_id')
                ->references('id')->on('posts')
                ->onDelete('cascade');
        });

        Schema::create('menu_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('menu_id');
            $table->string('title');
            $table->string('url', 200)->nullable();
            $table->string('locale', 20)->index();
            $table->timestamps();

            $table->unique(['menu_id', 'locale']);
            $table->foreign('menu_id')
                ->references('id')->on('menus')
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
        Schema::dropIfExists('menu_translations');
        Schema::dropIfExists('menus');
    }
}
