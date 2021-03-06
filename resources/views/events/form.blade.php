@extends('layouts.admin')

@section('title', 'Alterar Evento')

@section('content')

    @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
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
                                    @if (isset($event))
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Edit Event') }}</h1>
                                    @else
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Create Event') }}</h1>
                                    @endif
                                </div>
                                <!-- Form -->
                                <form id="form-update" class="user" method="POST"
                                    action="{{ isset($event) ? route('events.update', $event->id) : route('events.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0 col-xl-4">
                                            <div class="file-field">
                                                <div class="mb-4">
                                                    <label for="eventImage" image-preview="Fazer Upload"
                                                        style="width: 100%;">
                                                        <img src="{{ isset($event) ? asset($event->image_url) : asset('img/placeholder.png') }}"
                                                            class="placeholder" alt="placeholder">
                                                    </label>
                                                </div>
                                                <div class="file-input">
                                                    <input id="eventImage" name="eventimage" type="file">
                                                </div>
                                            </div>
                                            @error('eventimage')
                                                <span class="invalid-feedback" role="alert"
                                                    style="display: block; text-align:center;">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-sm-12 mb-3 mb-sm-0 col-xl-7">
                                            <div class="col-sm-12 mb-3" tooltip="{{ __('Event Name') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('event.name') is-invalid @enderror"
                                                    name="event[name]"
                                                    value="{{ old('event.name') ?? ($event->name ?? '') }}"
                                                    placeholder="{{ __('Event Name') }}">
                                                @error('event.name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row px-3 mb-3">
                                                <div class="col-sm-12 col-lg-6 mb-3 mg-lg-0"
                                                    tooltip="{{ __('Event Date') }}">
                                                    <input type="text"
                                                        class="form-control form-control-user @error('event.date') is-invalid @enderror"
                                                        name="event[date]" mask="date"
                                                        value="{{ old('event.date') ?? ($event->date ?? '') }}"
                                                        placeholder="{{ __('Event Date') }}">
                                                    @error('event.date')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-12 col-lg-6" tooltip="{{ __('Event Start Time') }}">
                                                    <input type="text"
                                                        class="form-control form-control-user @error('event.time') is-invalid @enderror"
                                                        name="event[time]" mask="time"
                                                        value="{{ old('event.time') ?? ($event->time ?? '') }}"
                                                        placeholder="{{ __('Event Start Time') }}">
                                                    @error('event.time')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3" tooltip="{{ __('Speaker Name') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('event.speaker_name') is-invalid @enderror"
                                                    name="event[speaker_name]"
                                                    value="{{ old('event.speaker_name') ?? ($event->speaker_name ?? '') }}"
                                                    placeholder="{{ __('Speaker Name') }}">
                                                @error('event.speaker_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="row mx-1">
                                                <div class="col-sm-6 mb-3 mb-sm-0"
                                                    tooltip="{{ __('Available Vacancies') }}">
                                                    <input type="number"
                                                        class="form-control form-control-user @error('event.available_vacancies') is-invalid @enderror"
                                                        name="event[available_vacancies]"
                                                        value="{{ old('event.available_vacancies') ?? ($event->available_vacancies ?? '') }}"
                                                        placeholder="{{ __('Available Vacancies') }}">
                                                    @error('event.available_vacancies')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="col-sm-6 mb-3" tooltip="{{ __('Duration') }}">
                                                    <input type="text"
                                                        class="form-control form-control-user @error('event.duration') is-invalid @enderror"
                                                        name="event[duration]" mask="time"
                                                        value="{{ old('event.duration') ?? ($event->duration ?? '') }}"
                                                        placeholder="{{ __('Duration') }}">
                                                    @error('event.duration')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card text-center col-12 mb-4" style="--bs-bg-opacity: .5;">
                                            <div class="card-body">
                                                <h4 class="card-title mb-4">{{ __('Event Certificate') }}</h4>
                                                <div class="form-group row">
                                                    <div class="col-sm-12 mb-3 mb-sm-0 col-xl-5">
                                                        <div class="file-field">
                                                            <div class="mb-4">
                                                                <label for="certificationImage" style="width: 100%;"
                                                                    image-preview="{{ __('Upload Image') }}">
                                                                    <img src="{{ isset($event) ? asset($event->certification->image_url) : asset('img/placeholder.png') }}"
                                                                        class="placeholder" alt="placeholder">
                                                                </label>
                                                            </div>
                                                            <div class="d-none">
                                                                <input id="certificationImage" name="certificationimage"
                                                                    type="file">
                                                            </div>
                                                        </div>
                                                        @error('certificationimage')
                                                            <span class="invalid-feedback" role="alert"
                                                                style="display: block; text-align: center;">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-12 mb-3 mb-sm-0 col-xl-7">
                                                        <div class="col-sm-12 mb-3"
                                                            tooltip="{{ __('Certificate Name') }}">
                                                            <input type="text"
                                                                class="form-control form-control-user @error('event.certification.title') is-invalid @enderror"
                                                                name="event[certification][title]"
                                                                value="{{ old('event.certification.title') ?? ($event->certification->title ?? '') }}"
                                                                placeholder="{{ __('Certificate Name') }}">
                                                            @error('event.certification.title')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-12 mb-3"
                                                            tooltip="{{ __('Certificate Text') }}">
                                                            <textarea
                                                                class="form-control form-control-user @error('event.certification.content') is-invalid @enderror"
                                                                name="event[certification][content]" rows="8"
                                                                placeholder="{{ __('Certificate Text') }}">{{ old('event.certification.content') ?? ($event->certification->content ?? '') }}</textarea>
                                                            @error('event.certification.content')
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
                                            <div class="col-sm-12 mb-3" tooltip="{{ __('Event Description') }}">
                                                <textarea
                                                    class="form-control form-control-user @error('event.description') is-invalid @enderror"
                                                    name="event[description]" rows="8"
                                                    placeholder="{{ __('Event Description') }}">{{ old('event.description') ?? ($event->description ?? '') }}</textarea>
                                                @error('event.description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row col-12 mx-auto">
                                            <div class="col-sm-12 mb-3 col-md-4" tooltip="{{ __('CEP') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('event.address.zipcode') is-invalid @enderror"
                                                    name="event[address][zipcode]" data-address="zipcode"
                                                    value="{{ old('event.address.zipcode') ?? ($event->address->zipcode ?? '') }}"
                                                    placeholder="{{ __('CEP') }}">
                                                @error('event.address.zipcode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-12 mb-3 col-md-2" tooltip="{{ __('UF') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('event.address.state') is-invalid @enderror"
                                                    name="event[address][state]" data-address="state"
                                                    value="{{ old('event.address.state') ?? ($event->address->state ?? '') }}"
                                                    placeholder="{{ __('UF') }}" readonly>
                                                @error('event.address.state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-12 mb-3 col-md-6" tooltip="{{ __('City') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('event.address.city') is-invalid @enderror"
                                                    name="event[address][city]" data-address="city"
                                                    value="{{ old('event.address.city') ?? ($event->address->city ?? '') }}"
                                                    placeholder="{{ __('City') }}" readonly>
                                                @error('event.address.city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row col-12 mx-auto">
                                            <div class="col-sm-12 mb-3 col-md-10" tooltip="{{ __('Address') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('event.address.street') is-invalid @enderror"
                                                    name="event[address][street]" data-address="street"
                                                    value="{{ old('event.address.street') ?? ($event->address->street ?? '') }}"
                                                    placeholder="{{ __('Address') }}" readonly>
                                                @error('event.address.street')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12 mb-3 col-md-2" tooltip="{{ __('Number') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('event.address.number') is-invalid @enderror"
                                                    name="event[address][number]"
                                                    value="{{ old('event.address.number') ?? ($event->address->number ?? '') }}"
                                                    placeholder="{{ __('Number') }}">
                                                @error('event.address.number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row col-12 mx-auto">
                                            <div class="col-sm-12 mb-3 col-md-6" tooltip="{{ __('District') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('event.address.district') is-invalid @enderror"
                                                    name="event[address][district]" data-address="district"
                                                    value="{{ old('event.address.district') ?? ($event->address->district ?? '') }}"
                                                    placeholder="{{ __('District') }}" readonly>
                                                @error('event.address.district')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12 mb-3 col-md-6" tooltip="{{ __('Local') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('event.address.complement') is-invalid @enderror"
                                                    name="event[address][complement]"
                                                    value="{{ old('event.address.complement') ?? ($event->address->complement ?? '') }}"
                                                    placeholder="{{ __('Local') }}">
                                                @error('event.address.complement')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row col-12 mx-auto">
                                            <div class="col-sm-12 mb-3 col-md-6" tooltip="{{ __('Event Status') }}">
                                                <select
                                                    class="form-control form-control-user @error('event.status') is-invalid @enderror"
                                                    name="event[status]">
                                                    <option value="" disabled selected>{{ __('Event Status') }}
                                                    </option>
                                                    @if (isset($event))
                                                        <option value="1" {{ $event->status == '1' ? 'selected' : '' }}>
                                                            {{ __('Active') }}
                                                        </option>
                                                        <option value="0" {{ $event->status == '0' ? 'selected' : '' }}>
                                                            {{ __('Inactive') }}
                                                        </option>
                                                    @else
                                                        <option value="1"
                                                            {{ old('event.status') == '1' ? 'selected' : '' }}>
                                                            {{ __('Active') }}
                                                        </option>
                                                        <option value="0"
                                                            {{ old('event.status') == '0' ? 'selected' : '' }}>
                                                            {{ __('Inactive') }}
                                                        </option>
                                                    @endif
                                                </select>
                                                @error('event.status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12 mb-3 col-md-6" tooltip="{{ __('Method') }}">
                                                <select
                                                    class="form-control form-control-user @error('event.method') is-invalid @enderror"
                                                    name="event[method]">
                                                    <option value="" disabled selected>{{ __('Method') }}</option>
                                                    @if (isset($event))
                                                        <option value="1" {{ $event->method == '1' ? 'selected' : '' }}>
                                                            {{ __('Check-in') }}
                                                        </option>
                                                        <option value="0" {{ $event->method == '0' ? 'selected' : '' }}>
                                                            {{ __('Check-in and Check-out') }}
                                                        </option>
                                                    @else
                                                        <option value="1"
                                                            {{ old('event.method') == '1' ? 'selected' : '' }}>
                                                            {{ __('Check-in') }}
                                                        </option>
                                                        <option value="0"
                                                            {{ old('event.method') == '0' ? 'selected' : '' }}>
                                                            {{ __('Check-in and Check-out') }}
                                                        </option>
                                                    @endif
                                                </select>
                                                @error('event.method')
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

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
