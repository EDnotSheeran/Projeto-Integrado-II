<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeadOfficeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_office', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->bigInteger('address_id')->unsigned();
            $table->timestamps();

            $table->index('address_id');
            $table->foreign('address_id')->references('id')->on('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('head_office');
    }
}
