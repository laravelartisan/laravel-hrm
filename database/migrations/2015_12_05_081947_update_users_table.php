<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('users');

        Schema::create('users', function (Blueprint $table) {

            $table->increments('id');
            $table->string('username');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('gender_id')->unsigned();

            $table->foreign('gender_id')
                  ->references('id')
                  ->on('gender')
                  ->onDelete('cascade');

            $table->integer('religion_id')->unsigned();

            $table->foreign('religion_id')
                  ->references('id')
                  ->on('religions')
                  ->onDelete('cascade');

            $table->string('phone');
            $table->string('address');
            $table->boolean('status');
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

            Schema::drop('users');
    }
}
