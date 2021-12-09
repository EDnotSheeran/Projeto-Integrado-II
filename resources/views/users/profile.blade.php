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
            @if ($errors->any())
                {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif
            <div class="card o-hidden border-0 shadow-lg my-5 col-xl-12">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('My Data') }}</h1>
                                </div>
                                {{-- Form --}}
                                <form id="form-update" class="user" method="POST"
                                    action="{{ route('profile') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text"
                                            class="form-control form-control-user @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ old('name') ?? ($user->name ?? '') }}"
                                            autocomplete="name" autofocus placeholder="{{ __('Name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row mb-0 mb-lg-3">
                                        <div class="col-sm-12 col-lg-6 mb-3 mb-lg-0">
                                            <input type="text"
                                                class="form-control form-control-user @error('username') is-invalid @enderror"
                                                id="username" name="username" placeholder="{{ __('Username') }}"
                                                value="{{ old('username') ?? ($user->username ?? '') }}"
                                                autocomplete="username" autofocus>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 col-lg-6 mb-3 mb-lg-0">
                                            <input type="text"
                                                class="form-control form-control-user @error('cpf') is-invalid @enderror"
                                                id="cpf" name="cpf" mask="cpf"
                                                value="{{ old('cpf') ?? ($user->cpf ?? '') }}"
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
                                            id="email" name="email" value="{{ old('email') ?? ($user->email ?? '') }}"
                                            autocomplete="email" placeholder="{{ __('E-Mail Address') }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12 col-lg-6 mb-3 mb-lg-0">
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
                                        <div class="col-sm-12 col-lg-6">
                                            <input type="password" class="form-control form-control-user"
                                                id="password-confirm" name="password_confirmation"
                                                autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input class="custom-control-input" type="checkbox" name="kind" id="kind"
                                                {{ old('kind') ?? isset($user->job_id) ? 'checked' : '' }}>

                                            <label class="custom-control-label" for="kind" style="line-height: 26px;">
                                                {{ __('City Hall employee') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div id="additionalData">
                                        <hr>
                                        <div class="form-group row mb-0 mb-lg-3">
                                            <div class="col-sm-12 col-lg-6 mb-3 mb-lg-0">
                                                <input type="text"
                                                    class="form-control form-control-user @error('registration_number') is-invalid @enderror"
                                                    id="registration_number" name="registration_number"
                                                    value="{{ old('registration_number') ?? ($user->registration_number ?? '') }}"
                                                    placeholder="{{ __('Registration') }}">
                                                @error('registration_number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12 col-lg-6 mb-3 mb-lg-0">
                                                <select
                                                    class="form-control form-control-user @error('job') is-invalid @enderror"
                                                    id="job" name="job">
                                                    <option value="" disabled>
                                                        {{ __('Office') }}</option>
                                                    @foreach ($jobs as $job)
                                                        <option value="{{ $job->id }}"
                                                            {{ (!isset($user->job_id) ? old('job') == $job->id : $user->job_id == $job->id) ? 'selected' : '' }}>
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
                                                id="head_office" name="head_office">

                                                <option value="" disabled>
                                                    {{ __('Head Office') }}</option>
                                                @foreach ($headOffices as $headOffice)
                                                    <option value="{{ $headOffice->id }}"
                                                        {{ (!isset($user->head_office_id) ? old('head_office') == $headOffice->id : $user->head_office_id == $headOffice->id) ? 'selected' : '' }}>
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
                                        {{ __('Save') }}
                                    </button>
                                    <a href="{{ route('profile.delete') }}" class="btn btn-danger btn-user btn-block"
                                        data-toggle="modal" data-target="#deleteModal"
                                        onclick="event.preventDefault();document.querySelector('#deleteButton').href = this.href">
                                        {{ __('Delete profile') }}
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- delete Modal-->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Are you sure?') }}</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">{{ __('Please confirm below if you want to delete your profile.') }}
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <a id="deleteButton" class="btn btn-primary" aria-labelledby="navbarDropdown" href="#">
                            {{ __('Delete') }}
                        </a>
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
