<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //polymorphic

        Schema::create('emails', function (Blueprint $table) {

            $table->increments('id');
            $table->string('email');
            $table->integer('emailer_id');
            $table->string('emailer_type');
            $table->boolean('status');
            $table->boolean('is_default');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down()
    {
        Schema::drop('emails');
    }

}
