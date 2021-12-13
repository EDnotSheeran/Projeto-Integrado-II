<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventParticipants;
use App\Models\Certification;
use Illuminate\Support\Facades\File;

class EventsController extends Controller
{
    public function __construct()
    {
        // Verifica se o usuário está logado
        $this->middleware('auth');
    }

    public function index()
    {
        // Busca todos os eventos
        $events = Event::all();
        // Retorna a view com os eventos
        return view('events.list', compact('events'));
    }

    public function new()
    {
        // Retorna a view de cadastro de eventos
        return view('events.form');
    }

    public function add(Request $request)
    {
        // Valida os dados do formulário
        $validated = $this->validate($request, $this->getRules(), $this->getCustomMessages(), $this->getcustomAttributes());
        //Faz o upload das imagens
        $validated['event']['image_url'] = $this->uploadImage($request->file('eventimage'));
        $validated['event']['certification']['image_url'] =  $this->uploadImage($request->file('certificationimage'));
        // Cria o endereço, cerfiticação e evento
        $Address = Address::create($validated['event']['address']);
        $Certification = Certification::create($validated['event']['certification']);
        $validated['event']['address_id'] = $Address->id;
        $validated['event']['certification_id'] = $Certification->id;
        Event::create($validated['event']);

        // Redireciona para a lista de eventos
        return redirect()->route('events')->with('success', 'Evento cadastrado com sucesso!');
    }

    public function edit(Request $request, $id)
    {
        // Busca o evento pelo id
        $event = Event::with(['address', 'certification'])->findOrFail($id);
        // Retorna a view de edição de eventos
        return view('events.form', compact('event'));
    }

    public function update(Request $request, $id)
    {
        // Valida os dados do formulário
        $validated = $this->validate($request, $this->getRules(true), $this->getCustomMessages(), $this->getcustomAttributes());
        // Busca o evento pelo id
        $event = Event::with(['address', 'certification'])->findOrFail($id);
        if ($request->hasFile('eventimage')) {
            $validated['event']['image_url'] = $this->uploadImage($request->file('eventimage'));
            if (File::exists(public_path() . '/' . $event->image_url)) {
                File::delete(public_path() . '/' . $event->image_url);
            }
        }
        if ($request->hasFile('certificationimage')) {
            $validated['event']['certification']['image_url'] =  $this->uploadImage($request->file('certificationimage'));
            if (File::exists(public_path() . '/' . $event->certification->image_url)) {
                File::delete(public_path() . '/' . $event->certification->image_url);
            }
        }
        $event->update($validated['event']);
        $event->certification->update($validated['event']['certification']);
        $event->address->update($validated['event']['address']);

        // Redireciona para a edição de eventos
        return redirect()->route('events.update', ['id' => $event->id])->with('success', 'Evento atualizado com sucesso!');
    }

    public function delete(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        $event->address->delete();
        $event->certification->delete();
        if (File::exists(public_path() . '/' . $event->image_url)) {
            File::delete(public_path() . '/' . $event->image_url);
        }
        if (File::exists(public_path() . '/' . $event->certification->image_url)) {
            File::delete(public_path() . '/' . $event->certification->image_url);
        }
        return redirect()->route('events')->with('success', 'Evento deletado com sucesso!');
    }

    public function participate(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $alreadyParticipating = EventParticipants::where('event_id', $id)->where('user_id', auth()->user()->id)->get();
        if (count($alreadyParticipating) > 0) {
            return redirect()->route('home')->with('warning', 'Você já está participando deste evento!');
        }

        if ($event->available_vacancies <= 0) {
            return redirect()->route('home')->with('warning', 'Não há mais vagas disponíveis para este evento!');
        }

        EventParticipants::create([
            'event_id' => $event->id,
            'user_id' => auth()->user()->id
        ]);
        return redirect()->route('home')->with('success', 'Você está participando do evento!');
    }

    public function unsubscribe($id)
    {
        $eventParticipant = EventParticipants::where('event_id', $id)->where('user_id', auth()->user()->id)->first();
        if (!$eventParticipant) {
            return redirect()->route('home')->with('warning', 'Você não está participando deste evento!');
        }
        $eventParticipant->delete();
        return redirect()->route('home')->with('success', 'Você não está mais participando do evento!');
    }

    function attendance(Request $request, $id)
    {
        $participants = EventParticipants::where('event_id', $id)->get();
        $event = Event::findOrFail($id);

        return view('events.attendance', compact('participants', 'event'));
    }

    private function uploadImage($image)
    {
        $imageName = 'uploads/' . md5(strtotime('now') . rand()) . '-' . $image->getClientOriginalName();
        $image->move(public_path('/uploads'), $imageName);
        return $imageName;
    }

    private function getCustomMessages()
    {
        return [
            'event.date.after' => 'O campo Data do evento deve ser uma data igual ou posterior a hoje.'
        ];
    }

    private function getcustomAttributes()
    {
        return [
            'event.name' => 'Nome do evento',
            'event.date' => 'Data do evento',
            'event.start_time' => 'Hora de início do evento',
            'event.end_time' => 'Hora de término do evento',
            'event.speaker_name' => 'Nome do palestrante',
            'event.avaliable_vacancies' => 'Quantidade de vagas disponíveis',
            'event.description' => 'Descrição do evento',
            'event.address.zipcode' => 'CEP do endereço',
            'event.address.state' => 'UF do endereço',
            'event.address.city' => 'Cidade do endereço',
            'event.address.street' => 'Endereço do evento',
            'event.address.number' => 'Número do endereço',
            'event.address.district' => 'Bairro do endereço',
            'event.address.complement' => 'Complemento do endereço',
            'event.status' => 'Status do evento',
            'event.method' => 'Método do evento',
            'event.certification.title' => 'Título da certificação',
            'event.certification.content' => 'Conteúdo da certificação',
            'eventimage' => 'Imagem do evento',
            'certificationimage' => 'Imagem da certificação'
        ];
    }

    private function getRules($updating = false)
    {
        return [
            'event.name' => 'required|max:255',
            'event.date' => 'required|date_format:d/m/Y|after:yesterday',
            'event.start_time' => 'required|date_format:H:i',
            'event.end_time' => 'required|after:event.start_time|date_format:H:i',
            'event.speaker_name' => 'required|max:255',
            'event.available_vacancies' => 'required|numeric',
            'event.description' => 'required|max:500',
            'event.address.zipcode' => 'required|max:9',
            'event.address.state' => 'required|max:2',
            'event.address.city' => 'required|max:255',
            'event.address.street' => 'required|max:255',
            'event.address.number' => 'required|max:10',
            'event.address.district' => 'required|max:255',
            'event.address.complement' => 'max:255',
            'event.status' => 'required|max:1',
            'event.method' => 'required|max:1',
            'event.certification.title' => 'required|max:255',
            'event.certification.content' => 'required|max:500',
            'eventimage' => (!$updating ? 'required|' : '') . 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'certificationimage' => (!$updating ? 'required|' : '') .  'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
