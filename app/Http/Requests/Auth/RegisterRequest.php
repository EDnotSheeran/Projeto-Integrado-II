<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Cpf;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user.name' => 'required',
            'user.email' => ['required', 'email', 'unique:users,email'],
            'user.cpf' => ['required', new Cpf, 'unique:users,cpf'],
            'user.password' => ['required', 'min:8', 'confirmed'],
            'phones.0.number' => ['required', 'size:14'],
            'phones.1.number' => ['required', 'size:15'],
            'address.cep' => ['required', 'size:9'],
            'address.uf' => ['required', 'size:2'],
            'address.city' => 'required',
            'address.street' => 'required',
            'address.number' => ['required', 'numeric', 'integer'],
            'address.district' => 'required',
            'address.complement' => ['nullable', 'max:25']
        ];
    }

    public function attributes()
    {
        return [
            'user.name' => 'Nome',
            'user.email' => 'E-mail',
            'user.cpf' => 'CPF',
            'user.password' => 'Senha',
            'phones.0.number' => 'Telefone',
            'phones.1.number' => 'Celular',
            'address.cep' => 'CEP',
            'address.uf' => 'UF',
            'address.city' => 'Cidade',
            'address.street' => 'Rua',
            'address.number' => 'Número',
            'address.district' => 'Bairro',
            'address.complement' => 'Complemento'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute deve ser preenchido.',
            'unique' => 'Este :attribute já esta sendo utilizado.',
        ];
    }
}
