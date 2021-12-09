
@extends(Auth::user() ? 'layouts.admin' : 'layouts.app')

@section('content')

<div class="container-fluid">
    @foreach ($eventos as $evento)
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary text-center">{{ $evento->nome }}</h3>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-6">

                    <div>
                        <img class="img-fluid rounded mx-auto d-block px-3 px-sm-4 mt-3 mb-4" style="width: 12rem;"
                            src="{{ asset($evento->imagem) }}" alt="...">

                    </div>


                    <div class="card-body font-weight-bold text-center">
                        <p>Endereço: {{ $evento->endereco }},{{ $evento->numero }}</p>
                        <p>Local: {{ $evento->local }}</p>
                        <p>Data: {{ date('d/m/Y', strtotime($evento->data)) }} Hora: {{ date('h:i', strtotime($evento->hora)) }}</p>
                        <p>Duração: {{ date('h:i', strtotime($evento->duracao)) }}</p>
                    </div>
                </div>


                <div class="col-6 text-center align-bottom">
                    <div class="card-body">
                        <p class="font-weight-bold">{{ __('Description') }}</p>
                        <p>{{ $evento->descricao }}</p>
                    </div>
                    <p class="font-weight-bold">Vagas Disponiveis: {{ $evento->vagas_disponiveis }}</p>
                    
                    
                    
                    <a href="{}" data-toggle="modal" data-target="#participeModal"
                                >
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Participate!') }}
                        </button>
                    </a>
                </div>
            </div>

        </div>
    </div>
    @endforeach

    <!-- Particioe Modal-->
    <div class="modal fade" id="participeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Você confirma sua inscrição no evento 'Name', que acontecerá no dia: 'Date'
                    às 'Time' no 'Endereço'
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" aria-labelledby="navbarDropdown" href=""
                        onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                        {{ __('Confirm') }}
                    </a>
                    <form id="delete-form" action="{{ route('home') }}" class="d-none">
                        @csrf
                        <input id="usuario-id" type="hidden" name="id" value="">
                    </form>
                </div>
            </div>
        </div>
    </div>



    


</div>
@endsection
