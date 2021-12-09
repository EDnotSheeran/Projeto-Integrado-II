@extends('layouts.admin')

@section('title', isset($job) ? __('Edit Job') : __('Create Job'))

@section('content')
    <div class="container ">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ __(session('success')) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session()->has('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ __(session('warning')) }}
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
                                    @if (isset($job))
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Edit Job') }}</h1>
                                    @else
                                        <h1 class="h4 text-gray-900 mb-4">{{ __('Create Job') }}</h1>
                                    @endif
                                </div>
                                <!-- Form -->
                                <form id="form-update" class="user" method="POST"
                                    action="{{ isset($job) ? route('job.update', $job->id) : route('job.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <div class="col-sm-12 mb-3 mg-lg-0" tooltip="{{ __('Job Name') }}">
                                                <input type="text"
                                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name') ?? ($job->name ?? '') }}"
                                                    placeholder="{{ __('Job Name') }}">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12" tooltip="{{ __('Job Description') }}">
                                                <textarea rows="5"
                                                    class="form-control form-control-user @error('description') is-invalid @enderror"
                                                    name="description"
                                                    placeholder="{{ __('Job Description') }}">{{ old('description') ?? ($job->description ?? '') }}</textarea>
                                                @error('description')
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
