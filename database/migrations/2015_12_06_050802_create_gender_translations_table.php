<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenderTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gender_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gender_id')->unsigned();

            $table->foreign('gender_id')
                ->references('id')
                ->on('gender')
                ->onDelete('cascade');

            $table->string('name');
            $table->string('locale')->index();

            $table->unique(['gender_id','locale']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gender_translations');
    }
}
