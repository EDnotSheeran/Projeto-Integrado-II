<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJobFkToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('job_id')->unsigned()->nullable();
            $table->index('job_id');
            $table->foreign('job_id')->references('id')->on('job');
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
            $table->dropForeign('users_job_id_foreign');
            $table->dropIndex('users_job_id_index');
            $table->dropColumn('job_id');
        });
    }
}
