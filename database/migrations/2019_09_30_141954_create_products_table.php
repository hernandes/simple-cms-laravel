<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sku');
            $table->double('weight')->nullable();
            $table->double('length')->nullable();
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('promotional_price')->nullable();
            $table->boolean('allow_price')->default(1);
            $table->string('availability')->nullable();
            $table->integer('stock')->default(0);
            $table->boolean('active')->default(true);
            $table->boolean('featured')->default(false);
            $table->boolean('released')->default(false);
            $table->text('description')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->timestamps();
        });


        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(true);
            $table->unsignedInteger('order')->default(0);
            $table->boolean('featured')->default(false);
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('slug');
            $table->longText('description')->nullable();
            $table->nestedSet();
            $table->timestamps();
        });

        Schema::create('product_product_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_category_id');
            $table->unsignedBigInteger('product_id');

            $table->unique(['product_category_id', 'product_id']);
            $table->foreign('product_category_id')
                ->references('id')->on('product_categories')
                ->onDelete('cascade');
            $table->foreign('product_id')
                ->references('id')->on('products')
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
        Schema::dropIfExists('product_product_category');
        Schema::dropIfExists('product_categories');
        Schema::dropIfExists('products');
    }
}
