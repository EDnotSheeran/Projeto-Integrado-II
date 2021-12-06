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

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255', 'regex:/^([^0-9]*)$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'username' => ['required', 'string', 'min:8', 'unique:users,username'],
            'cpf' => ['required', new Cpf, 'unique:users,cpf'],
            'kind' => ['string', 'nullable'],
            'job' => ['required_if:kind,on', 'integer', 'exists:job,id', 'nullable'],
            'head_office' => ['required_if:kind,on', 'integer', 'exists:head_office,id', 'nullable'],
            'registration_number' => ['required_if:kind,on', 'integer', 'digits:5', 'nullable']
        ], [], [
            'name' => 'Nome',
            'email' => 'E-mail',
            'password' => 'Senha',
            'username' => 'Usuário',
            'cpf' => 'CPF',
            'kind' => 'Tipo',
            'job' => 'Cargo',
            'head_office' => 'Sede',
            'registration_number' => 'Matrícula'
        ]);
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
            'job_id' => $data['job'] ?? null,
            'head_office_id' => $data['head_office'] ?? null,
            'registration_number' => $data['registration_number'] ?? null,
            'cpf' => $data['cpf']
        ]);
    }

    protected function showRegistrationForm()
    {
        $jobs = \App\Models\Job::all();
        $headOffices = \App\Models\HeadOffice::all();
        return view('auth.register', compact('jobs', 'headOffices'));
    }
}
