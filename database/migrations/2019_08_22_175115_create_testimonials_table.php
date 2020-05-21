<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('company')->nullable();
            $table->boolean('active')->default(true);
            $table->timestamps();
        });

        Schema::create('testimonial_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('testimonial_id');
            $table->text('body');
            $table->string('locale', 20)->index();
            $table->timestamps();

            $table->unique(['testimonial_id', 'locale']);
            $table->foreign('testimonial_id')
                ->references('id')->on('testimonials')
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
        Schema::dropIfExists('testimonial_translations');
        Schema::dropIfExists('testimonials');
    }
}
