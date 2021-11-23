@extends('layouts.admin')

@section('title', 'Alterar Evento')

@section('content')
<div class="container ">
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="card o-hidden border-0 shadow-lg my-5 col-xl-12">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                @if( Request::is('*/editar') )
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('Edit Event') }}</h1>
                                @else
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('Create Event') }}</h1>
                                @endif
                            </div>
                            {{-- Update --}}
                            @if( Request::is('*/editar') )
                            <form id="form-update" class="user" method="POST" action="{{ route('eventos.editar', $evento->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0 col-lg-5 col-xl-4">
                                        <div class="file-field">
                                            <div class="mb-4">
                                            <label for="imagemEvento">
                                                <img src="{{ asset($evento->imagem) }}"
                                                    class="placeholder" alt="placeholder">
                                                </div>
                                            </label>
                                            <div class="file-input">
                                                <input id="imagemEvento" name="evento[imagem]" type="file">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-3 mb-sm-0 col-lg-7 col-xl-8">
                                        <div class="col-sm-12 mb-3">
                                            <input type="text" class="form-control form-control-user @error('evento.nome') is-invalid @enderror"
                                                id="nomeEvento"
                                                name="evento[nome]"
                                                required
                                                value="{{ $evento->nome }}"
                                                placeholder="{{ __('Name') }}">
                                            @error('evento.nome')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row mx-1">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="date" class="form-control form-control-user @error('evento.data') is-invalid @enderror"
                                                    id="eventoData"
                                                    name="evento[data]"
                                                    required
                                                    value="{{ $evento->data }}"
                                                    placeholder="{{ __('Date') }}">
                                                @error('evento.data')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <input type="time" class="form-control form-control-user @error('evento.hora') is-invalid @enderror"
                                                    id="hora"
                                                    name="evento[hora]"
                                                    required
                                                    value="{{ $evento->hora}}"
                                                    placeholder="{{ __('Hour') }}">
                                                @error('evento.hora')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <input type="text" class="form-control form-control-user @error('evento.nome_palestrante') is-invalid @enderror"
                                                id="nome_palestranteEvento"
                                                name="evento[nome_palestrante]"
                                                required
                                                value="{{ $evento->nome_palestrante }}"
                                                placeholder="{{ __('Speaker Name') }}">
                                            @error('evento.nome_palestrante')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row mx-1">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="number" class="form-control form-control-user @error('evento.vagas_disponiveis') is-invalid @enderror"
                                                    id="vagas_disponiveis"
                                                    name="evento[vagas_disponiveis]"
                                                    required
                                                    value="{{ $evento->vagas_disponiveis }}"
                                                    placeholder="{{ __('Available Vacancies') }}">
                                                @error('evento.vagas_disponiveis')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <input type="time" class="form-control form-control-user @error('evento.duracao') is-invalid @enderror"
                                                    id="duracao"
                                                    name="evento[duracao]"
                                                    required
                                                    value="{{ $evento->duracao }}"
                                                    placeholder="{{ __('End Date') }}">
                                                @error('evento.duracao')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card text-center col-12 mb-4" style="--bs-bg-opacity: .5;">
                                        <div class="card-body">
                                            <h4 class="card-title">Certificado do Evento</h4>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-3 mb-sm-0 col-lg-5 col-xl-4">
                                                    <div class="file-field">
                                                        <div class="mb-4">
                                                        <label for="imagemCertificado">
                                                            <img src="{{ asset($certificado->imagem) }}"
                                                                class="placeholder" alt="placeholder">
                                                            </div>
                                                        </label>
                                                        <div class="d-none">
                                                            <input id="imagemCertificado" name="certificado[imagem]" type="file">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 mb-3 mb-sm-0 col-lg-7 col-xl-8">
                                                    <div class="col-sm-12 mb-3">
                                                        <input type="text" class="form-control form-control-user @error('certificado.nome') is-invalid @enderror"
                                                            id="nomeCertificado"
                                                            name="certificado[nome]"
                                                            required
                                                            value="{{ $certificado->nome }}"
                                                            placeholder="{{ __('Certificate Name') }}">
                                                        @error('certificado.nome')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-12 mb-3">
                                                        <textarea class="form-control form-control-user @error('certificado.texto') is-invalid @enderror"
                                                            id="textoCertificado"
                                                            name="certificado[texto]"
                                                            required
                                                            rows="8"
                                                            placeholder="{{ __('Certificate Text') }}">{{ $certificado->texto }}</textarea>
                                                        @error('certificado.texto')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                   
                                    <div class="form-group row col-12 mx-auto">
                                        <div class="col-sm-12 mb-3">
                                            <textarea class="form-control form-control-user @error('evento.descricao') is-invalid @enderror"
                                                id="descricaoEvento"
                                                name="evento[descricao]"
                                                required
                                                rows="8"
                                                placeholder="{{ __('Event Description') }}">{{ $evento->descricao }}</textarea>
                                            @error('evento.descricao')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row col-12 mx-auto">
                                        <div class="col-sm-12 mb-3 col-md-4">
                                            <input type="text" class="form-control form-control-user @error('evento.cep') is-invalid @enderror"
                                                id="cepEvento"
                                                name="evento[cep]"
                                                required
                                                value="{{ $evento->cep }}"
                                                placeholder="{{ __('cep') }}">
                                            @error('evento.cep')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-sm-12 mb-3 col-md-2">
                                            <input type="text" class="form-control form-control-user @error('evento.uf') is-invalid @enderror"
                                                id="ufEvento"
                                                name="evento[uf]"
                                                required
                                                value="{{ $evento->uf }}"
                                                placeholder="{{ __('uf') }}"
                                                readonly>
                                            @error('evento.uf')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    
                                        <div class="col-sm-12 mb-3 col-md-6">
                                            <input type="text" class="form-control form-control-user @error('evento.cidade') is-invalid @enderror"
                                                id="cidadeEvento"
                                                name="evento[cidade]"
                                                required
                                                value="{{ $evento->cidade }}"
                                                placeholder="{{ __('cidade') }}"
                                                readonly>
                                            @error('evento.cidade')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row col-12 mx-auto">
                                        <div class="col-sm-12 mb-3 col-md-10">
                                            <input type="text" class="form-control form-control-user @error('evento.endereco') is-invalid @enderror"
                                                id="enderecoEvento"
                                                name="evento[endereco]"
                                                required
                                                value="{{ $evento->endereco }}"
                                                placeholder="{{ __('Address') }}"
                                                readonly>
                                            @error('evento.endereco')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3 col-md-2">
                                            <input type="text" class="form-control form-control-user @error('evento.numero') is-invalid @enderror"
                                                id="numeroEvento"
                                                name="evento[numero]"
                                                required
                                                value="{{ $evento->numero }}"
                                                placeholder="{{ __('numero') }}">
                                            @error('evento.numero')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row col-12 mx-auto">
                                        <div class="col-sm-12 mb-3 col-md-6">
                                            <input type="text" class="form-control form-control-user @error('evento.bairro') is-invalid @enderror"
                                                id="bairroEvento"
                                                name="evento[bairro]"
                                                required
                                                value="{{ $evento->bairro }}"
                                                placeholder="{{ __('District') }}"
                                                readonly>
                                            @error('evento.bairro')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3 col-md-6">
                                            <input type="text" class="form-control form-control-user @error('evento.local') is-invalid @enderror"
                                                id="localEvento"
                                                name="evento[local]"
                                                required
                                                value="{{ $evento->local }}"
                                                placeholder="{{ __('Local') }}">
                                            @error('evento.local')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row col-12 mx-auto">
                                        <div class="col-sm-12 mb-3 col-md-6">
                                            <select class="form-control form-control-user @error('evento.status') is-invalid @enderror"
                                                id="statusEvento"
                                                name="evento[status]"
                                                required>
                                                <option value="" disabled selected>{{ __('Event Status') }}</option>
                                                <option value="true" {{ $evento->status == "1" ? 'selected': '' }}>Ativo</option>
                                                <option value="false" {{ $evento->status == "" ? 'selected': '' }}>Desativado</option>
                                            </select>
                                            @error('evento.status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3 col-md-6">
                                            <select class="form-control form-control-user @error('evento.metodo') is-invalid @enderror"
                                                id="metodoEvento"
                                                name="evento[metodo]"
                                                required>
                                                <option value="" disabled selected>{{ __('Method') }}</option>
                                                <option value="true" {{ $evento->metodo == "1" ? 'selected': '' }}>Ativo</option>
                                                <option value="false" {{ $evento->metodo == "" ? 'selected': '' }}>Desativado</option>
                                            </select>
                                            @error('evento.metodo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Save') }}
                                </button>
                            </form>
                            @else
                            {{-- Create --}}
                            <form class="user" method="POST" action="{{ route('eventos.novo') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0 col-lg-5 col-xl-4">
                                        <div class="file-field">
                                            <div class="mb-4">
                                            <label for="imagemEvento">
                                                <img src="{{ asset('img/placeholder.png') }}"
                                                    class="placeholder" alt="placeholder">
                                                </div>
                                            </label>
                                            <div class="file-input">
                                                <input id="imagemEvento" name="evento[imagem]" type="file" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 mb-3 mb-sm-0 col-lg-7 col-xl-8">
                                        <div class="col-sm-12 mb-3">
                                            <input type="text" class="form-control form-control-user @error('evento.nome') is-invalid @enderror"
                                                id="nomeEvento"
                                                name="evento[nome]"
                                                required
                                                value="{{ old('evento.nome') }}"
                                                placeholder="{{ __('Name') }}">
                                            @error('evento.nome')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row mx-1">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="date" class="form-control form-control-user @error('evento.data') is-invalid @enderror"
                                                    id="eventoData"
                                                    name="evento[data]"
                                                    required
                                                    value="{{ old('evento.data') }}"
                                                    placeholder="{{ __('Date') }}">
                                                @error('evento.data')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <input type="time" class="form-control form-control-user @error('evento.hora') is-invalid @enderror"
                                                    id="hora"
                                                    name="evento[hora]"
                                                    required
                                                    value="{{ old('evento.hora') }}"
                                                    placeholder="{{ __('Hour') }}">
                                                @error('evento.hora')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-3">
                                            <input type="text" class="form-control form-control-user @error('evento.nome_palestrante') is-invalid @enderror"
                                                id="nome_palestranteEvento"
                                                name="evento[nome_palestrante]"
                                                required
                                                value="{{ old('evento.nome_palestrante') }}"
                                                placeholder="{{ __('Speaker Name') }}">
                                            @error('evento.nome_palestrante')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="row mx-1">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="number" class="form-control form-control-user @error('evento.vagas_disponiveis') is-invalid @enderror"
                                                    id="vagas_disponiveis"
                                                    name="evento[vagas_disponiveis]"
                                                    required
                                                    value="{{ old('evento.vagas_disponiveis') }}"
                                                    placeholder="{{ __('Available Vacancies') }}">
                                                @error('evento.vagas_disponiveis')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6 mb-3">
                                                <input type="time" class="form-control form-control-user @error('evento.duracao') is-invalid @enderror"
                                                    id="duracao"
                                                    name="evento[duracao]"
                                                    required
                                                    value="{{ old('evento.duracao') }}"
                                                    placeholder="{{ __('End Date') }}">
                                                @error('evento.duracao')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card text-center col-12 mb-4" style="--bs-bg-opacity: .5;">
                                        <div class="card-body">
                                            <h4 class="card-title">Certificado do Evento</h4>
                                            <div class="form-group row">
                                                <div class="col-sm-12 mb-3 mb-sm-0 col-lg-5 col-xl-4">
                                                    <div class="file-field">
                                                        <div class="mb-4">
                                                        <label for="imagemCertificado">
                                                            <img src="{{ asset('img/placeholder.png') }}"
                                                                class="placeholder" alt="placeholder">
                                                            </div>
                                                        </label>
                                                        <div class="d-none">
                                                            <input id="imagemCertificado" name="certificado[imagem]" type="file">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 mb-3 mb-sm-0 col-lg-7 col-xl-8">
                                                    <div class="col-sm-12 mb-3">
                                                        <input type="text" class="form-control form-control-user @error('certificado.nome') is-invalid @enderror"
                                                            id="nomeCertificado"
                                                            name="certificado[nome]"
                                                            required
                                                            value="{{ old('certificado.nome') }}"
                                                            placeholder="{{ __('Certificate Name') }}">
                                                        @error('certificado.nome')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-12 mb-3">
                                                        <textarea class="form-control form-control-user @error('certificado.texto') is-invalid @enderror"
                                                            id="textoCertificado"
                                                            name="certificado[texto]"
                                                            required
                                                            rows="8"
                                                            placeholder="{{ __('Certificate Text') }}">{{ old('certificado.texto') }}</textarea>
                                                        @error('certificado.texto')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row col-12 mx-auto">
                                        <div class="col-sm-12 mb-3">
                                            <textarea class="form-control form-control-user @error('evento.descricao') is-invalid @enderror"
                                                id="descricaoEvento"
                                                name="evento[descricao]"
                                                required
                                                rows="8"
                                                placeholder="{{ __('Event Description') }}">{{ old('evento.descricao') }}</textarea>
                                            @error('evento.descricao')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    <div class="form-group row col-12 mx-auto">
                                        <div class="col-sm-12 mb-3 col-md-4">
                                            <input type="text" class="form-control form-control-user @error('evento.cep') is-invalid @enderror"
                                                id="cepEvento"
                                                name="evento[cep]"
                                                required
                                                value="{{ old('evento.cep') }}"
                                                placeholder="{{ __('CEP') }}">
                                            @error('evento.cep')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                
                                        <div class="col-sm-12 mb-3 col-md-2">
                                            <input type="text" class="form-control form-control-user @error('evento.cep') is-invalid @enderror"
                                                id="ufEvento"
                                                name="evento[uf]"
                                                required
                                                value="{{ old('evento.uf') }}"
                                                placeholder="{{ __('UF') }}"
                                                readonly>
                                            @error('evento.uf')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    
                                        
                                        <div class="col-sm-12 mb-3 col-md-6">
                                            <input type="text" class="form-control form-control-user @error('evento.cidade') is-invalid @enderror"
                                                id="cidadeEvento"
                                                name="evento[cidade]"
                                                required
                                                value="{{ old('evento.cidade') }}"
                                                placeholder="{{ __('Cidade') }}"
                                                readonly>
                                            @error('evento.cidade')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row col-12 mx-auto">
                                        <div class="col-sm-12 mb-3 col-md-10">
                                            <input type="text" class="form-control form-control-user @error('evento.endereco') is-invalid @enderror"
                                                id="enderecoEvento"
                                                name="evento[endereco]"
                                                required
                                                value="{{ old('evento.endereco') }}"
                                                placeholder="{{ __('Address') }}"
                                                readonly>
                                            @error('evento.endereco')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3 col-md-2">
                                            <input type="text" class="form-control form-control-user @error('evento.numero') is-invalid @enderror"
                                                id="numeroEvento"
                                                name="evento[numero]"
                                                required
                                                value="{{ old('evento.numero') }}"
                                                placeholder="{{ __('Number') }}">
                                            @error('evento.numero')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row col-12 mx-auto">
                                        <div class="col-sm-12 mb-3 col-md-6">
                                            <input type="text" class="form-control form-control-user @error('evento.bairro') is-invalid @enderror"
                                                id="bairroEvento"
                                                name="evento[bairro]"
                                                required
                                                value="{{ old('evento.bairro') }}"
                                                placeholder="{{ __('District') }}"
                                                readonly>
                                            @error('evento.bairro')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                         
    
                                        <div class="col-sm-12 mb-3 col-md-6">
                                            <input type="text" class="form-control form-control-user @error('evento.local') is-invalid @enderror"
                                                id="localEvento"
                                                name="evento[local]"
                                                required
                                                value="{{ old('evento.local') }}"
                                                placeholder="{{ __('Complemento') }}">
                                            @error('evento.local')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row col-12 mx-auto">
                                        <div class="col-sm-12 mb-3 col-md-6">
                                            <select class="form-control form-control-user @error('evento.status') is-invalid @enderror"
                                                id="statusEvento"
                                                name="evento[status]"
                                                required>
                                                <option value="" disabled selected>{{ __('Event Status') }}</option>
                                                <option value="true" {{ old('evento.status') == "true" ? 'selected': '' }}>Ativo</option>
                                                <option value="false" {{ old('evento.status') == "false" ? 'selected': '' }}>Desativado</option>
                                            </select>
                                            @error('evento.status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3 col-md-6">
                                            <select class="form-control form-control-user @error('evento.metodo') is-invalid @enderror"
                                                id="metodoEvento"
                                                name="evento[metodo]"
                                                required>
                                                <option value="" disabled selected>{{ __('Method') }}</option>
                                                <option value="true" {{ old('evento.metodo') == "true" ? 'selected': '' }}>Ativo</option>
                                                <option value="false" {{ old('evento.metodo') == "false" ? 'selected': '' }}>Desativado</option>
                                            </select>
                                            @error('evento.metodo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Save') }}
                                </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script src="{{ asset('js/jquery-3.6.0.js') }}" ></script>
<script src="{{ asset('js/plugins/jquery.mask.min.js') }}" ></script>
<script src="{{ asset('js/eventos/eventos.js') }}"></script>

