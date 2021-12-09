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
                            <form id="form-update" class="user" method="POST" action="{{ route('usuarios.update', $usuario->id) }}" enctype="multipart/form-data">
                                @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror"
                                            id="name"
                                            name="name"
                                            value="{{ $usuario->name }}"
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
                                                value="{{ $usuario->username }}"
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
                                                value="{{ $usuario->cpf }}"
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
                                            value="{{ $usuario->email }}"
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
                                                id="tipo" {{ $usuario->tipo == 2 ? 'checked' : '' }}>

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
                                                    value="{{ $usuario->matricula }}"
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
                                                    value="{{ $usuario->cargo }}"
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
                                                value="{{ $usuario->sede }}"
                                                placeholder="{{ __('Head Office') }}">
                                            @error('sede')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        {{ __('Save') }}
                                    </button>
                            </form>
                            @else
                            {{-- Create --}}
                            <form class="user" method="POST" action="{{ route('usuarios.store') }}" enctype="multipart/form-data">
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
    <script src="{{ asset('js/jquery-3.6.0.js') }}" ></script>
    <script src="{{ asset('js/plugins/jquery.mask.min.js') }}" ></script>
    <script type="module">
        const $ = window.$;

        function toogleDadosAdicionais({ animate } = { animate: true }) {
            const campos = [$('#matricula'), $('#cargo'), $('#sede')];

            if (tipo.checked) {
                limpaCampos(campos);
                setCamposObrigatorios(campos);
                animate && $('#dadosAdicionais').addClass('animate-grow');
                animate && $('#dadosAdicionais').removeClass('animate-shrink');
                $('#dadosAdicionais').show();
            } else {
                limpaCampos(campos);
                removeCamposObrigatorios(campos);
                animate && $('#dadosAdicionais').removeClass('animate-grow');
                animate && $('#dadosAdicionais').addClass('animate-shrink');
                animate &&$('#dadosAdicionais').one("animationend", function(){
                    $(this).hide();
                });
                !animate && $('#dadosAdicionais').hide();
            }
        }

        function limpaCampos(fields) {
            fields.map(field => {
                field.val('');
            });
        }

        function setCamposObrigatorios(fields) {
            fields.map(field => {
                field.attr('required',true);
            });
        }

        function removeCamposObrigatorios(fields) {
            fields.map(field => {
                field.removeAttr('required');
            });
        }

        if(tipo){
            toogleDadosAdicionais({animate: false});
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
