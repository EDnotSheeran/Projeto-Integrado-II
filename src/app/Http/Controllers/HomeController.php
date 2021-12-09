<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class HomeController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        return View('home', compact('eventos'));
    }
}
