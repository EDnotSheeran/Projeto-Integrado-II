<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Validator;

use App\Rules\Cpf;
use PDOException;
use phpDocumentor\Reflection\Types\Nullable;

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
        $requestData = $request->all();
        $requestData['cpf'] = preg_replace('/[^0-9]/', '', $requestData['cpf']);

        $validator = Validator::make($requestData, [
            'name' => ['required', 'string', 'max:255', 'regex:/^([^0-9]*)$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'string', 'min:8', 'unique:users,username'],
            'cpf' => ['required', new Cpf, 'unique:users,cpf'],
            'tipo' => ['string', 'nullable'],
            'cargo' => ['required_if:tipo,on', 'string', 'max:255', 'regex:/^([^0-9]*)$/', 'nullable'],
            'sede' => ['required_if:tipo,on', 'string', 'max:255', 'regex:/^([^0-9]*)$/', 'nullable'],
            'matricula' => ['required_if:tipo,on','integer','max:999999', 'nullable']
        ]);

        // Se a validação falhar, redireciona para a página de edição
        if ($validator->fails()) {
            return redirect()->route('usuarios.create')
                ->withErrors($validator)
                ->withInput();
        }

        // Pega os dados validados e filtra os campos que não devem ser atualizados
        $validated = $validator->validated();

        $usuario = new User();
        try{
            $usuario->create($validated);
        }catch(PDOException $ex){

        };
        return redirect('/usuarios');
    }
    function edit($id){
        $usuario = User::find($id);
        return view('usuarios.form', compact('usuario'));
    }
    function update(Request $request, $id){
        $requestData = $request->all();
        $requestData['cpf'] = preg_replace('/[^0-9]/', '', $requestData['cpf']);

        $validator = Validator::make($requestData, [
            'name' => ['required', 'string', 'max:255', 'regex:/^([^0-9]*)$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ['nullable', 'string', 'min:8'],
            'username' => ['required', 'string', 'min:8', 'unique:users,username,'.$id],
            'cpf' => ['required', new Cpf, 'unique:users,cpf,'.$id],
            'tipo' => ['string', 'nullable'],
            'cargo' => ['required_if:tipo,on', 'string', 'max:255', 'regex:/^([^0-9]*)$/', 'nullable'],
            'sede' => ['required_if:tipo,on', 'string', 'max:255', 'regex:/^([^0-9]*)$/', 'nullable'],
            'matricula' => ['required_if:tipo,on','integer','max:999999', 'nullable']
        ]);

        // Se a validação falhar, redireciona para a página de edição
        if ($validator->fails()) {
            return redirect()->route('usuarios.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        // Pega os dados validados e filtra os campos que não devem ser atualizados
        $validated = $validator->validated();
        $validated = array_filter($validated, function($key){
            return !in_array($key, ['password', 'password_confirmation']);
        }, ARRAY_FILTER_USE_KEY);

        $usuario = User::find($id);

        try{
            $usuario->update($validated);
        }catch(PDOException $ex){
            
        };
        
        return redirect('/usuarios');
    }
    function delete(Request $request){
        $usuario = User::findOrFail($request->input('id'));

        try{
            $usuario->delete();
        }catch(PDOException $ex){
            
        };
        $usuario->delete();
        
        return redirect('/usuarios');
    }
    function editProfile($id){
        $usuario = User::findOrFail($id);
        $this->authorize('editProfile', $usuario);
        return view('usuarios.profile', compact('usuario'));
    }

    function updateProfile(Request $request, $id){
        $requestData = $request->all();
        
        $requestData['cpf'] = preg_replace('/[^0-9]/', '', $requestData['cpf']);

        $validator = Validator::make($requestData, [
            'name' => ['required', 'string', 'max:255', 'regex:/^([^0-9]*)$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ['nullable', 'string', 'min:8'],
            'username' => ['required', 'string', 'min:8', 'unique:users,username,'.$id],
            'cpf' => ['required', new Cpf, 'unique:users,cpf,'.$id],
            'tipo' => ['string', 'nullable'],
            'cargo' => ['required_if:tipo,on', 'string', 'max:255', 'regex:/^([^0-9]*)$/', 'nullable'],
            'sede' => ['required_if:tipo,on', 'string', 'max:255', 'regex:/^([^0-9]*)$/', 'nullable'],
            'matricula' => ['required_if:tipo,on','integer','max:999999', 'nullable']
        ]);

        // Se a validação falhar, redireciona para a página de edição
        if ($validator->fails()) {
            return redirect()->route('usuarios.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        // Pega os dados validados e filtra os campos que não devem ser atualizados
        $validated = $validator->validated();
        $validated = array_filter($validated, function($key){
            return !in_array($key, ['password', 'password_confirmation']);
        }, ARRAY_FILTER_USE_KEY);

        $usuario = User::find($id);
        $this->authorize('editProfile', $usuario);
        try{
            $usuario->update($validated);
        }catch(PDOException $ex){
            
        };
        
        return redirect('/');
    }

    
}
