@extends('layouts.app')

@section('title', __('Register') . ' - ')

@section('content')
    <div class="container ">
        <div class="row justify-content-center">
            <div class="card o-hidden border-0 shadow-lg my-5 col-xl-8">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('Register') }}</h1>
                                </div>
                                <form class="user" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') }}" autocomplete="name" autofocus
                                            placeholder="{{ __('Name') }}">
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
                                                value="{{ old('username') }}" autocomplete="username" autofocus>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="text"
                                                class="form-control form-control-user @error('cpf') is-invalid @enderror"
                                                id="cpf" name="cpf" value="{{ old('cpf') }}"
                                                placeholder="{{ __('CPF') }}">
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
                                            id="email" name="email" value="{{ old('email') }}" autocomplete="email"
                                            placeholder="{{ __('E-Mail Address') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
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
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="password-confirm" name="password_confirmation"
                                                autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input class="custom-control-input" type="checkbox" name="kind" id="kind"
                                                {{ old('kind') ? 'checked' : '' }}>

                                            <label class="custom-control-label" for="kind" style="line-height: 26px;">
                                                {{ __('Sou funcionário da prefeitura') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div id="additionalData">
                                        <hr>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text"
                                                    class="form-control form-control-user @error('registration_number') is-invalid @enderror"
                                                    id="registration_number" name="registration_number"
                                                    value="{{ old('registration_number') }}"
                                                    placeholder="{{ __('Registration') }}">
                                                @error('registration_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <select
                                                    class="form-control form-control-user @error('job') is-invalid @enderror"
                                                    id="job" name="job">
                                                    <option value="" disabled>
                                                        {{ __('Office') }}</option>
                                                    @foreach ($jobs as $job)
                                                        <option value="{{ $job->id }}"
                                                            {{ old('job') == $job->id ? 'selected' : '' }}>
                                                            {{ $job->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('job')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <select
                                                class="form-control form-control-user @error('head_office') is-invalid @enderror"
                                                id="head_office" name="head_office" value="{{ old('head_office') }}"
                                                placeholder="{{ __('Head Office') }}">

                                                <option value="" disabled>
                                                    {{ __('Head Office') }}</option>
                                                @foreach ($headOffices as $headOffice)
                                                    <option value="{{ $headOffice->id }}"
                                                        {{ old('head_office') == $headOffice->id ? 'selected' : '' }}>
                                                        {{ $headOffice->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('head_office')
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

        $().ready(function() {
            $('#job').find('option[selected="selected"]').each(function() {
                $(this).prop('selected', true);
            });
            $('#head_office').find('option[selected="selected"]').each(function() {
                $(this).prop('selected', true);
            });
            $('#registration_number').val($('#registration_number').attr('value'))
        });


        function toogleAdditionalData({
            animate
        } = {
            animate: true
        }) {
            const fields = [$('#registration_number'), $('#job'), $('#head_office')];

            if (kind.checked) {
                clearFields(fields);
                animate && $('#additionalData').addClass('animate-grow');
                animate && $('#additionalData').removeClass('animate-shrink');
                $('#additionalData').show();
            } else {
                clearFields(fields);
                animate && $('#additionalData').removeClass('animate-grow');
                animate && $('#additionalData').addClass('animate-shrink');
                animate && $('#additionalData').one("animationend", function() {
                    $(this).hide();
                });
                !animate && $('#additionalData').hide();
            }
        }

        function clearFields(fields) {
            fields.map(field => {
                field.val('');
            });
        }

        let kind = document.querySelector('#kind');
        console.log(kind.che);

        if (kind) {
            toogleAdditionalData({
                animate: false
            });
            kind.addEventListener('change', function() {
                toogleAdditionalData();
            });
        }
    </script>

@endpush
