<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\HeadOffice;

class HeadOfficeController extends Controller
{
    public function __construct()
    {
        // Verifica se o usuário está logado
        $this->middleware('auth');
    }

    function index()
    {
        $headOffices = HeadOffice::all();
        return view('headoffice.list', compact('headOffices'));
    }

    function new()
    {
        return view('headoffice.form');
    }

    function add(Request $request)
    {
        $validated = $this->validate($request, $this->getRules(), [], $this->getcustomAttributes());
        $address = Address::create($validated['address']);
        $validated['address_id'] = $address->id;
        HeadOffice::create($validated);
        return redirect()->route('headOffices')->with('success', 'Sede cadastrada com sucesso!');
    }

    function edit($id)
    {
        $headOffice = HeadOffice::with('address')->findOrFail($id);
        return view('headoffice.form', compact('headOffice'));
    }

    function update(Request $request, $id)
    {
        $validated = $this->validate($request, $this->getRules(), [], $this->getcustomAttributes());
        $headOffice = HeadOffice::findOrFail($id);
        $headOffice->update($validated);
        $headOffice->address->update($validated['address']);
        return redirect()->route('headOffice.update', $id)->with('success', 'Sede atualizada com sucesso!');
    }

    function delete($id)
    {
        $headOffice = HeadOffice::findOrFail($id);
        if ($headOffice->employees->count() > 0) {
            return redirect()->route('headOffices', $id)->with('warning', 'Sede não pode ser excluída pois possui funcionários cadastrados!');
        }
        $headOffice->delete();
        $headOffice->address->delete();
        return redirect()->route('headOffices')->with('success', 'Sede excluída com sucesso!');
    }

    private function getcustomAttributes()
    {
        return [
            'name' => 'Nome do evento',
            'description' => 'Descrição do evento',
            'address.zipcode' => 'CEP do endereço',
            'address.state' => 'UF do endereço',
            'address.city' => 'Cidade do endereço',
            'address.street' => 'Endereço do evento',
            'address.number' => 'Número do endereço',
            'address.district' => 'Bairro do endereço',
            'address.complement' => 'Complemento do endereço',
        ];
    }

    private function getRules($updating = false)
    {
        return [
            'name' => 'required|max:255',
            'description' => 'required|max:500',
            'address.zipcode' => 'required|max:9',
            'address.state' => 'required|max:2',
            'address.city' => 'required|max:255',
            'address.street' => 'required|max:255',
            'address.number' => 'required|max:10',
            'address.district' => 'required|max:255',
            'address.complement' => 'max:255',
        ];
    }
}
