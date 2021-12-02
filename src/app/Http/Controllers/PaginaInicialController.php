<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class PaginaInicialController extends Controller
{
 
    public function index()
    {
    $eventos = Evento::all();
    return View('index', compact('eventos')); 
    }

   
}