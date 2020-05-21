<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('active')->default(true);
            $table->unsignedInteger('sequence')->default(0);
            $table->timestamps();
        });

        Schema::create('faq_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('faq_id');
            $table->string('question');
            $table->longText('answer');
            $table->string('locale', 20)->index();
            $table->timestamps();

            $table->unique(['faq_id', 'locale']);
            $table->foreign('faq_id')
                ->references('id')->on('faqs')
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
        Schema::dropIfExists('faq_translations');
        Schema::dropIfExists('faqs');
    }
}
