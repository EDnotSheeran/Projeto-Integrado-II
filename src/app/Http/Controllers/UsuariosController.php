<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UsuariosController extends Controller
{
    function index(){
        $usuarios = User::all();
        return view('usuarios.list', compact('usuarios'));
    }
    //
}
