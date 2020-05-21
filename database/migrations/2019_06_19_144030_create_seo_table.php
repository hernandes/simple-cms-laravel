<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model_type', 150);
            $table->unsignedBigInteger('model_id');
            $table->timestamps();

            $table->index(['model_type', 'model_id']);
        });

        Schema::create('seo_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('seo_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('keywords', 500)->nullable();
            $table->string('locale', 20)->index();
            $table->timestamps();

            $table->unique(['seo_id', 'locale']);
            $table->foreign('seo_id')
                ->references('id')->on('seo')
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
        Schema::dropIfExists('seo_translations');
        Schema::dropIfExists('seo');
    }
}
