@extends('layouts.app')

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
                        <p>Data: {{ $evento->data }} Hora: {{ $evento->hora}}</p>
                    </div>
                </div>


                <div class="col-6 text-center align-bottom">
                    <div class="card-body">
                        <p class="font-weight-bold">{{ __('Description') }}</p>
                        <p>{{ $evento->descricao }}</p>
                    </div>
                    <p class="font-weight-bold">Vagas Disponiveis: {{ $evento->vagas_disponiveis }}</p>
                    <a href="{{ route('login') }}">
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            {{ __('Participate!') }}
                        </button>
                    </a>
                </div>
            </div>

        </div>
    </div>
    @endforeach



</div>
@endsection
