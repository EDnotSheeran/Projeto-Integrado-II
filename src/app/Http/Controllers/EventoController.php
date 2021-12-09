<?php

namespace App\Http\Controllers;


use PDOException;
use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Certificado;
use Illuminate\Support\Facades\Validator;

class EventoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $eventos = Evento::all();
        return view('eventos.list', compact('eventos'));
    }

    public function new(Request $request)
    {
        return view('eventos.form');
    }

    public function presentlist(Request $request)
    {
        return view('eventos.presentlist');
    }

    public function add(Request $request)
    {
        $mensagens = [
            'after' => 'A data do evento não pode ser anterior ao dia atual.'          
        ];

        // Validar os dados do formulário
        $validator = Validator::make($request->all(), [
            'evento.nome' => 'required|max:255',
            'evento.data' => 'required|after:yesterday',
            'evento.hora' => 'required',
            'evento.nome_palestrante' => 'required|max:255',
            'evento.vagas_disponiveis' => 'required|numeric',
            'evento.duracao' => 'required',
            'evento.descricao' => 'required|max:500',
            'evento.cep' => 'required|max:9',
            'evento.uf' => 'required|max:2',
            'evento.cidade' => 'required|max:255',
            'evento.endereco' => 'required|max:255',
            'evento.numero' => 'required|max:10',
            'evento.bairro' => 'required|max:255',
            'evento.local' => 'required|max:255',
            'evento.complemento' => 'max:255',
            'evento.status' => 'required|max:1',
            'certificado.nome' => 'required|max:255',
            'certificado.texto' => 'required|max:255',
        ], $mensagens);

        // Se a validação falhar, redireciona para a página de edição
        if ($validator->fails()) {
            return redirect()->route('eventos.edit')
                ->withErrors($validator)
                ->withInput();
        }

        // Pega os dados validados e filtra os campos que não devem ser atualizados
        $validated = $validator->validated();

        $certificado = new Certificado();
        $evento = new Evento();

        // Salva a imagem do evento
        if ($request->hasFile('evento.imagem') && $request->file('evento.imagem')->isValid()) {
            $eventoImagem = $request->file('evento.imagem');
            $extension = $eventoImagem->getClientOriginalExtension();
            $imageName = md5($eventoImagem->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $request->file('evento.imagem')->move(public_path('/uploads'), $imageName);
            $validated['evento']['imagem'] = 'uploads/' . $imageName;
        }

        // Salva a imagem do certificado
        if ($request->hasFile('certificado.imagem') && $request->file('certificado.imagem')->isValid()) {
            $certificadoImagem = $request->file('certificado.imagem');
            $extension = $certificadoImagem->getClientOriginalExtension();
            $imageName = md5($certificadoImagem->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $request->file('certificado.imagem')->move(public_path('/uploads'), $imageName);
            $validated['certificado']['imagem'] = 'uploads/' . $imageName;
        }

        // Salva o certificado e o evento
        $certificado = $certificado->create($validated['certificado']);
        $validated['evento']['certificado_id'] = $certificado->id;

        try{
            $evento = $evento->create($validated['evento']);
        }catch(PDOException $ex){
            
        };
        

        // Redireciona para a lista de eventos
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
        $mensagens = [
            'after' => 'A data do evento não pode ser anterior ao dia atual.'          
        ];
        
        // Validação
        $validator = Validator::make($request->all(), [
            'evento.nome' => 'required|max:255',
            'evento.data' => 'required|after:yesterday',
            'evento.hora' => 'required',
            'evento.nome_palestrante' => 'required|max:255',
            'evento.vagas_disponiveis' => 'required|numeric',
            'evento.duracao' => 'required',
            'evento.descricao' => 'required|max:500',
            'evento.cep' => 'required|max:9',
            'evento.uf' => 'required|max:2',
            'evento.cidade' => 'required|max:255',
            'evento.endereco' => 'required|max:255',
            'evento.numero' => 'required|max:10',
            'evento.bairro' => 'required|max:255',
            'evento.local' => 'required|max:255',
            'evento.complemento' => 'max:255',
            'evento.status' => 'required|max:1',
            'certificado.nome' => 'required|max:255',
            'certificado.texto' => 'required|max:255',
        ], $mensagens);

        // Se a validação falhar, redireciona para a página de edição
        if ($validator->fails()) {
            return redirect()->route('eventos.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        // Pega os dados validados e filtra os campos que não devem ser atualizados
        $validated = $validator->validated();

        $evento = Evento::findOrFail($id);
        $certificado = Certificado::findOrFail($evento->certificado_id);

        if ($request->hasFile('evento.imagem') && $request->file('evento.imagem')->isValid()) {
            $eventoImagem = $request->file('evento.imagem');
            $extension = $eventoImagem->getClientOriginalExtension();
            $imageName = md5($eventoImagem->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $request->file('evento.imagem')->move(public_path('/uploads'), $imageName);
            $validated['evento']['imagem'] = 'uploads/' . $imageName;
        }

        if ($request->hasFile('certificado.imagem') && $request->file('certificado.imagem')->isValid()) {
            $certificadoImagem = $request->file('certificado.imagem');
            $extension = $certificadoImagem->getClientOriginalExtension();
            $imageName = md5($certificadoImagem->getClientOriginalName() . strtotime('now')) . '.' . $extension;
            $request->file('certificado.imagem')->move(public_path('/uploads'), $imageName);
            $validated['certificado']['imagem'] = 'uploads/' . $imageName;
        }

        try{
            $evento->update($validated['evento']);
            $certificado->update($validated['certificado']);
        }catch(PDOException $ex){
            
        };

        

        return redirect()->route('eventos.update', ['id' => $evento->id])->with('success', 'Evento atualizado com sucesso!');
    }

    public function delete(Request $request)
    {
        $evento = Evento::findOrFail($request->all()['id']);
        $certificado = Certificado::findOrFail($evento->certificado_id);

        try{
            $evento->delete();
            $certificado->delete();
        }catch(PDOException $ex){
            
        };
        

        return redirect()->route('eventos')->with('success', 'Evento deletado com sucesso!');
    }
}
