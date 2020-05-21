<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('only_home')->default(false);
            $table->string('url')->nullable();
            $table->timestamps();
        });

        Schema::create('modal_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('modal_id');
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->string('locale', 20)->index();
            $table->timestamps();

            $table->unique(['modal_id', 'locale']);
            $table->foreign('modal_id')
                ->references('id')->on('modals')
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
        Schema::dropIfExists('modal_translations');
        Schema::dropIfExists('modals');
    }
}
