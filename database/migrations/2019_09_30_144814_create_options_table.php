<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->boolean('is_global')->default(false);
            $table->boolean('is_required');
            $table->timestamps();
        });

        Schema::create('option_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('option_id');
            $table->string('locale', 20)->index();
            $table->string('name');
            $table->timestamps();

            $table->unique(['option_id', 'locale']);
            $table->foreign('option_id')
                ->on('options')->references('id')
                ->onDelete('cascade');
        });

        Schema::create('option_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('option_id')->index();
            $table->unsignedDecimal('price', 18, 4)->nullable();
            $table->string('price_type', 10);
            $table->timestamps();

            $table->foreign('option_id')
                ->on('options')->references('id')
                ->onDelete('cascade');
        });

        Schema::create('option_value_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('option_value_id');
            $table->string('locale', 20)->index();
            $table->string('label');
            $table->timestamps();

            $table->unique(['option_value_id', 'locale']);
            $table->foreign('option_value_id')
                ->on('option_values')->references('id')
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
        Schema::dropIfExists('option_value_translations');
        Schema::dropIfExists('option_values');
        Schema::dropIfExists('option_translations');
        Schema::dropIfExists('options');
    }
}
