<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key', 100)->nullable();
            $table->boolean('active')->default(true);
            $table->integer('sequence');
            $table->string('type', 20)->default('image');
            $table->string('model_type', 150);
            $table->unsignedBigInteger('model_id');
            $table->string('file');
            $table->timestamps();

            $table->index(['model_type', 'model_id']);
        });

        Schema::create('media_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('media_id');
            $table->string('title')->nullable();
            $table->string('alt')->nullable();
            $table->text('description')->nullable();
            $table->string('locale', 20)->index();
            $table->timestamps();

            $table->unique(['media_id', 'locale']);
            $table->foreign('media_id')
                ->references('id')->on('medias')
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
        Schema::dropIfExists('media_translations');
        Schema::dropIfExists('medias');
    }
}
