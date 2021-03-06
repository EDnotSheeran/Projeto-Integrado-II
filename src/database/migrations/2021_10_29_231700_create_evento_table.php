<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evento', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data');  
            $table->time('hora');
            $table->string('nome_palestrante');
            $table->integer('vagas_disponiveis');
            $table->time('duracao');
            $table->unsignedBigInteger('certificado_id');
            $table->string('descricao');
            $table->string('cep');
            $table->string('uf');
            $table->string('cidade');
            $table->string('endereco');
            $table->string('numero');
            $table->string('bairro');
            $table->string('local');
            $table->string('complemento')-> nullable();
            $table->boolean('status');
            $table->string('imagem');
            $table->timestamps();
            
            $table->foreign('certificado_id')->references('id')->on('certificado');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evento');
    }
}
