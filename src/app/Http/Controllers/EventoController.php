<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Certificado;
use Faker\Core\Number;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\isNan;

class EventoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $eventos = Evento::all();

        return view('eventos.list', compact('eventos'));
    }

    public function new(Request $request)
    {
        return view('eventos.form');
    }

    public function add(Request $request)
    {
        $requestData = $request->all();
        $certificado = new Certificado();
        $evento = new Evento();

        if ($request->hasFile('evento.imagem') && $request->file('evento.imagem')->isValid()) {
            $eventoImagem = $request->file('evento.imagem');
            $extension = $eventoImagem->getClientOriginalExtension();
            $imageName = md5($eventoImagem->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $request->file('evento.imagem')->move(public_path('/uploads'), $imageName);
            $requestData['evento']['imagem'] = 'uploads/' . $imageName;
        }

        if ($request->hasFile('certificado.imagem') && $request->file('certificado.imagem')->isValid()) {
            $certificadoImagem = $request->file('certificado.imagem');
            $extension = $certificadoImagem->getClientOriginalExtension();
            $imageName = md5($certificadoImagem->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $request->file('certificado.imagem')->move(public_path('/uploads'), $imageName);
            $requestData['certificado']['imagem'] = 'uploads/' . $imageName;
        }

        $certificado = $certificado->create($requestData['certificado']);
        $requestData['evento']['certificado_id'] = $certificado->id;
        $evento = $evento->create($requestData['evento']);

        return redirect()->route('eventos')->with('success', 'Evento cadastrado com sucesso!');
    }

    public function edit(Request $request)
    {
        if (!is_numeric($request->id)) {
            return view('404', ['message' => 'Evento não encontrado']);
        }

        $evento = Evento::findOrFail($request->id);
        $certificado = Certificado::where('id', $evento->certificado_id)->first();

        return view('eventos.form', compact('evento', 'certificado'));
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();
        $evento = Evento::findOrFail($id);
        $certificado = Certificado::findOrFail($evento->certificado_id);

        if ($request->hasFile('evento.imagem') && $request->file('evento.imagem')->isValid()) {
            $eventoImagem = $request->file('evento.imagem');
            $extension = $eventoImagem->getClientOriginalExtension();
            $imageName = md5($eventoImagem->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $request->file('evento.imagem')->move(public_path('/uploads'), $imageName);
            $requestData['evento']['imagem'] = 'uploads/' . $imageName;
        }

        if ($request->hasFile('certificado.imagem') && $request->file('certificado.imagem')->isValid()) {
            $certificadoImagem = $request->file('certificado.imagem');
            $extension = $certificadoImagem->getClientOriginalExtension();
            $imageName = md5($certificadoImagem->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $request->file('certificado.imagem')->move(public_path('/uploads'), $imageName);
            $requestData['certificado']['imagem'] = 'uploads/' . $imageName;
        }

        $evento->update($requestData['evento']);
        $certificado->update($requestData['certificado']);

        return redirect()->route('eventos.editar', ['id' => $evento->id])->with('success', 'Evento atualizado com sucesso!');
    }

    public function delete(Request $request)
    {
        $evento = Evento::findOrFail($request->all()['id']);
        $certificado = Certificado::findOrFail($evento->certificado_id);

        $evento->delete();
        $certificado->delete();

        return redirect()->route('eventos')->with('success', 'Evento deletado com sucesso!');
    }
}
