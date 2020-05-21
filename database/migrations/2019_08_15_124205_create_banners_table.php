<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('url')->nullable();
            $table->boolean('active');
            $table->unsignedInteger('sequence')->default(0);
            $table->timestamps();
        });

        Schema::create('banner_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('banner_id');
            $table->text('phrases')->nullable();
            $table->string('locale', 20)->index();
            $table->timestamps();

            $table->foreign('banner_id')
                ->references('id')->on('banners')
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
        Schema::dropIfExists('banner_translations');
        Schema::dropIfExists('banners');
    }
}
