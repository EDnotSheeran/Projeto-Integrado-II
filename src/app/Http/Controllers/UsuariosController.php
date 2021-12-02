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

    function new(){
        return view('usuarios.form');
    }
    function add(Request $request){
        return $request;
        $usuario = new User();
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = $request->input('password');
        $usuario->save();
        return redirect('/usuarios');
    }
    //
}
