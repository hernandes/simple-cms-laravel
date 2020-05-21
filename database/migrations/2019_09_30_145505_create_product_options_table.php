<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedBigInteger('option_id')->index();

            $table->foreign('product_id')
                ->on('products')->references('id')
                ->onDelete('cascade');

            $table->foreign('option_id')
                ->on('options')->references('id')
                ->onDelete('cascade');
        });

        Schema::create('product_option_values', function (Blueprint $table) {
            $table->unsignedBigInteger('product_option_id');
            $table->unsignedBigInteger('option_value_id');

            $table->primary(['product_option_id', 'option_value_id'], 'product_option_id_option_value_id_primary');
            $table->foreign('product_option_id')
                ->on('product_options')->references('id')
                ->onDelete('cascade');
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
        Schema::dropIfExists('product_option_values');
        Schema::dropIfExists('product_options');
    }
}
