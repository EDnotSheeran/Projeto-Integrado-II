@extends('layouts.admin')

@section('content')


<div class="text-center">
    <h1 class="h1 text-gray-900 mb-1">{{ __('Meus Dados') }}</h1>
</div>
@if( Request::is('*/editar') )
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="card o-hidden border-0 shadow-lg my-5 col-xl-12">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h3 text-gray-900 mb-5">{{ __('Alterar Dados') }}</h1>
                            </div>
                            <form id="form-update" class="user" method="POST"
                                action="{{ route('profile.update', $usuario->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-user @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ $usuario->name }}" required autocomplete="name"
                                        autofocus placeholder="{{ __('Name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text"
                                            class="form-control form-control-user @error('username') is-invalid @enderror"
                                            id="username" name="username" placeholder="{{ __('Nome de Usuário') }}"
                                            value="{{ $usuario->username }}" required autocomplete="username" autofocus>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text"
                                            class="form-control form-control-user @error('cpf') is-invalid @enderror"
                                            id="cpf" name="cpf" required value="{{ $usuario->cpf }}"
                                            placeholder="{{__('CPF')}}">
                                        @error('cpf')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ $usuario->email }}" required
                                        autocomplete="email" placeholder="{{ __('E-Mail Address') }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input class="custom-control-input" type="checkbox" name="tipo" id="tipo"
                                            {{ $usuario->tipo == 2 ? 'checked' : '' }}>

                                        <label class="custom-control-label" for="tipo" style="line-height: 26px;">
                                            {{ __('Sou funcionário da prefeitura') }}
                                        </label>
                                    </div>
                                </div>
                                <div id="dadosAdicionais">

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text"
                                                class="form-control form-control-user @error('matricula') is-invalid @enderror"
                                                id="matricula" name="matricula" value="{{ $usuario->matricula }}"
                                                placeholder="{{ __('Registration') }}">
                                            @error('matricula')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="text"
                                                class="form-control form-control-user @error('cargo') is-invalid @enderror"
                                                id="cargo" name="cargo" value="{{ $usuario->cargo }}"
                                                placeholder="{{ __('Office') }}">
                                            @error('cargo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('sede') is-invalid @enderror"
                                            id="sede" name="sede" value="{{ $usuario->sede }}"
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



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">

    <div class="row justify-content-center">
        <div class="card o-hidden border-0 shadow-lg my-5 col-xl-12">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h3 text-gray-900 mb-5">{{ __('Alterar senha') }}</h1>
                            </div>

                            <form id="form-update" class="user" method="POST"
                                action="{{ route('profile.update', $usuario->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">

                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="password" name="password" autocomplete="new-password"
                                                placeholder="{{ __('Password') }}">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="password" name="password" autocomplete="new-password"
                                                placeholder="{{ __('New Password') }}">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="password-confirm" name="password_confirmation"
                                                autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    {{ __('Save') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endif

@endsection
