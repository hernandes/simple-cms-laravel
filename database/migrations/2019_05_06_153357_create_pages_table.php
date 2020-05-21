<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key', 100);
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('page_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('page_id');
            $table->string('title', 200);
            $table->string('slug', 150);
            $table->longText('body')->nullable();
            $table->string('locale', 20)->index();
            $table->timestamps();

            $table->unique(['slug', 'locale']);
            $table->unique(['page_id', 'locale']);
            $table->foreign('page_id')
                ->references('id')->on('pages')
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
        Schema::dropIfExists('page_translations');
        Schema::dropIfExists('pages');
    }
}
