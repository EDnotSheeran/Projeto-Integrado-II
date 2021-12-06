<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('speaker_name');
            $table->integer('available_vacancies')->unsigned();
            $table->text('description');
            $table->boolean('status');
            $table->boolean('method');
            $table->string('image_url');
            $table->timestamps();

            $table->bigInteger('certification_id')->unsigned()->unique();
            $table->index('certification_id');
            $table->foreign('certification_id')->references('id')->on('certification');

            $table->bigInteger('address_id')->unsigned()->unique();
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
        Schema::dropIfExists('event');
    }
}
