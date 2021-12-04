<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddHeadOfficeFkToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->bigInteger('head_office_id')->unsigned()->nullable();
            $table->index('head_office_id');
            $table->foreign('head_office_id')->references('id')->on('head_office');
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
            $table->dropForeign('users_head_office_id_foreign');
            $table->dropIndex('users_head_office_id_index');
            $table->dropColumn('head_office_id');
        });
    }
}
