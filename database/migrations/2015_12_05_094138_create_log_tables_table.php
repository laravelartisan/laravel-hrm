<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //plymorphic
        Schema::create('log_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('message');
            $table->string('created_by');
            $table->integer('loggable_id');
            $table->string('loggable_type');
            $table->string('ip_address');
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('log_tables');
    }
}
