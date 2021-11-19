<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'evento';

    protected $fillable = [
        'nome',
        'data',
        'hora',
        'nome_palestrante',
        'vagas_disponiveis',
        'duracao',
        'certificado_id',
        'descricao',
        'endereco',
        'bairro',
        'local',
        'status',
        'metodo',
        'imagem'
    ];
}
