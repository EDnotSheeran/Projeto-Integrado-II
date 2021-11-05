<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('cargo')->nullable();
            $table->string('sede')->nullable();
            $table->integer('matricula')->nullable();
            $table->integer('cpf');
            $table->integer('tipo')->default(1);
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
            $table->dropColumn('cargo');
            $table->dropColumn('sede');
            $table->dropColumn('matricula');
            $table->dropColumn('cpf');
            $table->dropColumn('tipo');
        });
    }
}
