@extends('layouts.admin')

@section('title', (isset($headOffice) ? __('Edit Event') : __('Create Event')) . ' - ')

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
                                    @if (isset($headOffice))
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Edit HeadOffice') }}</h1>
                                    @else
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Create HeadOffice') }}</h1>
                                    @endif
                                </div>
                                <!-- Form -->
                                <form id="form-update" class="user" method="POST"
                                    action="{{ isset($headOffice) ? route('headOffice.update', $headOffice->id) : route('headOffice.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="form-group row col-12 mx-auto">
                                            <div class="col-sm-12 mb-3" tooltip="{{ __('HeadOffice Name') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name') ?? ($headOffice->name ?? '') }}"
                                                    placeholder="{{ __('HeadOffice Name') }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row col-12 mx-auto">
                                            <div class="col-sm-12 mb-3" tooltip="{{ __('HeadOffice Description') }}">
                                                <textarea
                                                    class="form-control form-control-user @error('description') is-invalid @enderror"
                                                    name="description" rows="8"
                                                    placeholder="{{ __('HeadOffice Description') }}">{{ old('description') ?? ($headOffice->description ?? '') }}</textarea>
                                                @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row col-12 mx-auto">
                                            <div class="col-sm-12 mb-3 col-md-4" tooltip="{{ __('CEP') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('address.zipcode') is-invalid @enderror"
                                                    name="address[zipcode]" data-address="zipcode"
                                                    value="{{ old('address.zipcode') ?? ($headOffice->address->zipcode ?? '') }}"
                                                    placeholder="{{ __('CEP') }}">
                                                @error('address.zipcode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-12 mb-3 col-md-2" tooltip="{{ __('UF') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('address.state') is-invalid @enderror"
                                                    name="address[state]" data-address="state"
                                                    value="{{ old('address.state') ?? ($headOffice->address->state ?? '') }}"
                                                    placeholder="{{ __('UF') }}" readonly>
                                                @error('address.state')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <div class="col-sm-12 mb-3 col-md-6" tooltip="{{ __('City') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('address.city') is-invalid @enderror"
                                                    name="address[city]" data-address="city"
                                                    value="{{ old('address.city') ?? ($headOffice->address->city ?? '') }}"
                                                    placeholder="{{ __('City') }}" readonly>
                                                @error('address.city')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="form-group row col-12 mx-auto">
                                            <div class="col-sm-12 mb-3 col-md-10" tooltip="{{ __('Address') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('address.street') is-invalid @enderror"
                                                    name="address[street]" data-address="street"
                                                    value="{{ old('address.street') ?? ($headOffice->address->street ?? '') }}"
                                                    placeholder="{{ __('Address') }}" readonly>
                                                @error('address.street')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12 mb-3 col-md-2" tooltip="{{ __('Number') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('address.number') is-invalid @enderror"
                                                    name="address[number]"
                                                    value="{{ old('address.number') ?? ($headOffice->address->number ?? '') }}"
                                                    placeholder="{{ __('Number') }}">
                                                @error('address.number')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row col-12 mx-auto">
                                            <div class="col-sm-12 mb-3 col-md-6" tooltip="{{ __('District') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('address.district') is-invalid @enderror"
                                                    name="address[district]" data-address="district"
                                                    value="{{ old('address.district') ?? ($headOffice->address->district ?? '') }}"
                                                    placeholder="{{ __('District') }}" readonly>
                                                @error('address.district')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12 mb-3 col-md-6" tooltip="{{ __('Local') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('address.complement') is-invalid @enderror"
                                                    name="address[complement]"
                                                    value="{{ old('address.complement') ?? ($headOffice->address->complement ?? '') }}"
                                                    placeholder="{{ __('Local') }}">
                                                @error('address.complement')
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

@push('scripts')


@endpush
