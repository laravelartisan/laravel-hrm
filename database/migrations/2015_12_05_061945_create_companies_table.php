<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('main_url');
            $table->string('logical_url');
            $table->string('physical_url');
            $table->integer('group_id')->unsigned();

            $table->foreign('group_id')
                  ->references('id')
                  ->on('company_groups')
                  ->onDelete('cascade');

            $table->boolean('status');
            $table->integer('position');
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
        Schema::drop('company');
    }
}
