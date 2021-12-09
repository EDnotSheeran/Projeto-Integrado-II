<?php

namespace App\Http\Controllers;

use App\Models\EventParticipants;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Job;
use App\Models\HeadOffice;
use Illuminate\Support\Facades\Hash;

use App\Rules\Cpf;

class UsersController extends Controller
{
    public function __construct()
    {
        // Verifica se o usuário está logado
        $this->middleware('auth');
    }

    function index()
    {
        $users = User::all();
        return view('users.list', compact('users'));
    }

    function new()
    {
        $jobs = Job::all();
        $headOffices = HeadOffice::all();
        return view('users.form', compact('jobs', 'headOffices'));
    }

    function add(Request $request)
    {
        // dd($request->all());
        $validated = $this->validate($request, $this->getRules(), [], $this->getcustomAttributes());
        $validated['cpf'] = preg_replace('/[^0-9]/', '', $validated['cpf']);
        $validated['password'] = Hash::make($validated['password']);
        if (isset($validated['role'])) {
            $validated['role'] = 'admin';
        }
        // dd($validated);
        User::create($validated);
        return redirect()->route('users')->with('success', 'Usuario criado com sucesso!');
    }

    function edit($id)
    {
        $user = User::with(['job', 'head_office'])->findOrfail($id);
        $jobs = Job::all();
        $headOffices = HeadOffice::all();
        return view('users.form', compact('user', 'jobs', 'headOffices'));
    }

    function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validated = $this->validate($request, $this->getRules(true), [], $this->getcustomAttributes());
        $validated['cpf'] = preg_replace('/[^0-9]/', '', $validated['cpf']);
        $validated['username'] = $validated['username'] == $user->username ? null : $validated['username'];
        $validated['email'] = $validated['email'] == $user->email ? null : $validated['email'];
        $validated['cpf'] = $validated['cpf'] == $user->cpf ? null : $validated['cpf'];
        $validated['registration_number'] = $validated['registration_number'] == $user->registration_number ? null : $validated['registration_number'];

        $validated = array_filter($validated, function ($key) use ($validated) {
            return $validated[$key] != null;
        }, ARRAY_FILTER_USE_KEY);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        if (isset($validated['role'])) {
            $validated['role'] = 'admin';
        } else {
            $validated['role'] = 'default';
        }

        if (!isset($validated['kind'])) {
            $validated['job_id'] = null;
            $validated['head_office_id'] = null;
            $validated['registration_number'] = null;
        } else {
            $validated['job_id'] = $validated['job'];
            $validated['head_office_id'] = $validated['head_office'];
        }

        $user->update($validated);
        return redirect()->route('user.update', $id)->with('success', 'Usuario editado com sucesso!');
    }

    function delete(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users');
    }

    function profile()
    {
        $user = auth()->user();
        $jobs = Job::all();
        $headOffices = HeadOffice::all();
        return view('users.profile', compact('user', 'jobs', 'headOffices'));
    }

    function updateProfile(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $validated = $this->validate($request, $this->getRules(true), [], $this->getcustomAttributes());
        $validated['cpf'] = preg_replace('/[^0-9]/', '', $validated['cpf']);
        $validated['username'] = $validated['username'] == $user->username ? null : $validated['username'];
        $validated['email'] = $validated['email'] == $user->email ? null : $validated['email'];
        $validated['cpf'] = $validated['cpf'] == $user->cpf ? null : $validated['cpf'];
        $validated['registration_number'] = $validated['registration_number'] == $user->registration_number ? null : $validated['registration_number'];

        $validated = array_filter($validated, function ($key) use ($validated) {
            return $validated[$key] != null;
        }, ARRAY_FILTER_USE_KEY);

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        if (!isset($validated['kind'])) {
            $validated['job_id'] = null;
            $validated['head_office_id'] = null;
            $validated['registration_number'] = null;
        } else {
            $validated['job_id'] = $validated['job'];
            $validated['head_office_id'] = $validated['head_office'];
        }

        $user->update($validated);
        return redirect()->route('profile')->with('success', 'Perfil editado com sucesso!');
    }

    function deleteProfile(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $user->delete();
        return redirect()->route('profile');
    }

    function agenda()
    {
        $event_participants = EventParticipants::with('event')->where('user_id', auth()->user()->id)->get();
        return view('users.agenda', compact('event_participants'));
    }

    private function getcustomAttributes()
    {
        return [
            'name' => 'Nome',
            'email' => 'E-mail',
            'password' => 'Senha',
            'username' => 'Usuário',
            'cpf' => 'CPF',
            'kind' => 'Tipo',
            'job' => 'Cargo',
            'head_office' => 'Sede',
            'registration_number' => 'Matrícula'
        ];
    }

    private function getRules($updating = false)
    {
        return [
            'name' => 'required|string|max:255|regex:/^([^0-9]*)$/',
            'email' => !$updating ? 'required|unique:users,email|' : 'nullable|' . 'string|email|max:255',
            'password' => !$updating ? 'required|' : 'nullable|' . 'string|min:8|confirmed',
            'username' => !$updating ? 'required|unique:users,username|' : 'nullable|' . 'string|min:8',
            'cpf' => [!$updating ? 'required' : 'nullable', !$updating ? 'unique:users,cpf' : null, new Cpf],
            'kind' => 'string|nullable',
            'job' => 'required_if:kind,on|integer|exists:job,id|nullable',
            'head_office' => 'required_if:kind,on|integer|exists:head_office,id|nullable',
            'registration_number' => !$updating ? 'required_if:kind,on|nullable|sometimes|unique:users,registration_number|' : '' . 'integer|digits:5|nullable',
            'role' => 'nullable|string',
        ];
    }
}
