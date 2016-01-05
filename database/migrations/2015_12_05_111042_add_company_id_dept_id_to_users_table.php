<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyIdDeptIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
           $table->integer('company_id')->unsigned()->after('religion_id');

           $table->foreign('company_id')
                 ->references('id')
                 ->on('company')
                 ->onDelete('cascade');

            $table->integer('department_id')->unsigned()->after('company_id');

            $table->foreign('department_id')
                ->references('id')
                ->on('department')
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
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn('company_id');
            $table->dropColumn('department_id');
        });
    }
}
