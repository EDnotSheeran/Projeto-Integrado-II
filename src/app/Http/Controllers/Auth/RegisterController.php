<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\Cpf;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $data['cpf'] = str_replace(['.', '-'], ['', ''], $data['cpf']);


        $mensagens = [
            'required' => 'O campo :attribute é obrigátorio.',
            'required_if' => 'O campo :attribute é obrigátorio.',
            'matricula.integer' => 'Neste campo é permitido somente números.',
            'matricula.max' => 'O limite máximo para esse campo é de 6 digitos',
            'regex' => 'Neste campo não é permitido números.'
            
        ];

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'regex:/^([^0-9]*)$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'string', 'min:8', 'unique:users,username'],
            'cpf' => ['required', new Cpf, 'unique:users,cpf'],
            'tipo' => ['string', 'nullable'],
            'cargo' => ['required_if:tipo,on', 'string', 'max:255', 'regex:/^([^0-9]*)$/', 'nullable'],
            'sede' => ['required_if:tipo,on', 'string', 'max:255', 'regex:/^([^0-9]*)$/', 'nullable'],
            'matricula' => ['required_if:tipo,on','integer','max:999999', 'nullable']
        ], $mensagens);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $data['cpf'] = str_replace(['.', '-'], ['', ''], $data['cpf']);

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'cargo' => $data['cargo'] ?? null,
            'sede' => $data['sede'] ?? null,
            'matricula' => $data['matricula'] ?? null,
            'cpf' => $data['cpf'],
            'tipo' => $data['tipo'] ?? null === 'on' ? 'comum' : 'comum', //O user deve ser por padrão comum
        ]);
    }
}
