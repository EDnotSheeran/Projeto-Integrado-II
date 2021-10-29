<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $requestData = $request->validated();

        DB::beginTransaction();
        try {
            // Dados do usuario a ser criado
            $userData = $requestData['user'];
            $userData['role'] = 'participant';
            $user = User::create($userData);

            abort(500);

            // Dados do endereco do usuario
            $addressData = $requestData['address'];
            $user->address()->create($addressData);

            // telefones do usuario
            foreach ($requestData['phones'] as $phone) {
                $user->phones()->create($phone);
            }
            DB::commit();

            return redirect()->route('login')->with('success', 'Usuário cadastrado com sucesso!');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Erro ao cadastrar usuário');
        }
    }
}
