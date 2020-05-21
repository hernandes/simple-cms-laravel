<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailGroupEmailRecipientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_group_email_recipient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('email_group_id');
            $table->unsignedBigInteger('email_recipient_id');

            $table->unique(['email_group_id', 'email_recipient_id'], 'email_group_email_recipient_unique');
            $table->foreign('email_group_id')
                ->references('id')->on('email_groups')
                ->onDelete('cascade');
            $table->foreign('email_recipient_id')
                ->references('id')->on('email_recipients')
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
        Schema::dropIfExists('email_group_email_recipient');
    }
}
