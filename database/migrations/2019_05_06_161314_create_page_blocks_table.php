<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_blocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key', 100);
            $table->boolean('active')->default(true);
            $table->integer('sequence');
            $table->unsignedBigInteger('page_id');
            $table->timestamps();

            $table->unique(['key', 'page_id']);
            $table->foreign('page_id')
                ->references('id')->on('pages')
                ->onDelete('cascade');
        });

        Schema::create('page_block_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('page_block_id');
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('body')->nullable();
            $table->string('locale', 20)->index();
            $table->timestamps();

            $table->unique(['page_block_id', 'locale']);
            $table->foreign('page_block_id')
                ->references('id')->on('page_blocks')
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
        Schema::dropIfExists('page_block_translations');
        Schema::dropIfExists('page_blocks');
    }
}
