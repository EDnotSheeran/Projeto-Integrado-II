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
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('Edit User') }}</h1>
                                @else
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('Create User') }}</h1>
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
                                                    value="{{ $evento->hora }}"
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
                                        <div class="col-sm-12 mb-3">
                                            <input type="text" class="form-control form-control-user @error('evento.endereco') is-invalid @enderror"
                                                id="enderecoEvento"
                                                name="evento[endereco]"
                                                required
                                                value="{{ $evento->endereco }}"
                                                placeholder="{{ __('Address') }}">
                                            @error('evento.endereco')
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
                                                placeholder="{{ __('District') }}">
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
                            <form class="user" method="POST" action="{{ route('usuarios.novo') }}" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                                            id="name"
                                            name="name"
                                            value="{{ old('name') }}"
                                            required autocomplete="name" autofocus
                                            placeholder="{{ __('Name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror"
                                                id="username"
                                                name="username"
                                                placeholder="{{ __('Nome de Usuário') }}"
                                                value="{{ old('username') }}"
                                                required
                                                autocomplete="username" autofocus>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text" class="form-control form-control-user @error('cpf') is-invalid @enderror"
                                                id="cpf"
                                                name="cpf"
                                                required
                                                value="{{ old('cpf') }}"
                                                placeholder="{{__('CPF')}}"

                                                >
                                            @error('cpf')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                            id="email"
                                            name="email"
                                            value="{{ old('email') }}"
                                            required autocomplete="email"
                                            placeholder="{{ __('E-Mail Address') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="password"
                                                name="password"
                                                required
                                                autocomplete="new-password"
                                                placeholder="{{ __('Password') }}">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="password-confirm"
                                                name="password_confirmation"
                                                required
                                                autocomplete="new-password"
                                                placeholder="{{ __('Confirm Password') }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input class="custom-control-input"
                                                type="checkbox"
                                                name="tipo"
                                                id="tipo" {{ old('tipo') ? 'checked' : '' }}>

                                            <label class="custom-control-label" for="tipo" style="line-height: 26px;">
                                                {{ __('Sou funcionário da prefeitura') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div id="dadosAdicionais">
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user @error('matricula') is-invalid @enderror"
                                                    id="matricula"
                                                    name="matricula"
                                                    value="{{ old('matricula') }}"
                                                    placeholder="{{ __('Registration') }}">
                                                @error('matricula')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user @error('cargo') is-invalid @enderror"
                                                    id="cargo"
                                                    name="cargo"
                                                    value="{{ old('cargo') }}"
                                                    placeholder="{{ __('Office') }}">
                                                @error('cargo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user @error('sede') is-invalid @enderror"
                                                id="sede"
                                                name="sede"
                                                value="{{ old('sede') }}"
                                                placeholder="{{ __('Head Office') }}">
                                            @error('sede')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('Register') }}
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
@push('scripts')
    <script type="module">
        const $ = window.$;

        function toogleDadosAdicionais() {
            const campos = [$('#matricula'), $('#cargo'), $('#sede')];

            if (tipo.checked) {
                $('#dadosAdicionais').show();
            } else {
                limpaCampos(campos);
                $('#dadosAdicionais').hide();
            }
        }

        function limpaCampos(fields) {
            fields.map(field => {
                field.val('');
            });
        }

        if(tipo){
            toogleDadosAdicionais()
            tipo.addEventListener('change', function() {
                toogleDadosAdicionais();
            });
        }

    </script>

    <script>
        (function( $ ) {
            $(function() {
                $("#cpf").mask("000.000.000-00");
             });
        })(jQuery);
    </script>

@endpush
