<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Users_Events;

use Illuminate\Support\Facades\Validator;
use PDOException;

class UsuariosEventos extends Controller

{
    function add(Request $request){
        $requestData = $request->all();

        $validator = Validator::make($requestData, [
            'id_evento' => ['required'],
            'id_usuario' => ['required'],
            'situacao' => ['required']
        ]);

        // Se a validação falhar, redireciona para a página de edição
        if ($validator->fails()) {
            return redirect()->route('evento.edit')
                ->withErrors($validator)
                ->withInput();
        }

        // Pega os dados validados e filtra os campos que não devem ser atualizados
        $validated = $validator->validated();

        $users_events = new Users_Events();
        try{
            $users_events->create($validated);
        }catch(PDOException $ex){

        };
        return redirect('/home');
    }
}
