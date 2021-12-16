@extends('layouts.admin')

@section('title', __('Certificates') . ' - ')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ __('My Certificates') }}</h1>
    <p class="mb-4"></p>


    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- Events -->

    @foreach ($participants as $participant)
        <div class="card w-100">
            <div class="card-body">
                <h5 class="card-title">{{ $participant->event->name }}</h5>
                <p class="card-text text-truncate" style="max-width: 1000px;">{{ $participant->event->description }}</p>
                <a href="https://drive.google.com/file/d/1IMJNqVjEs0xag-Ze0uJ-DQe6GW9AOLqr/view" class="btn btn-primary"><i
                        class="fas fa-arrow-circle-down mr-2"></i>{{ __('Certificate') }}</a>
            </div>
        </div>
    @endforeach
@endsection

@push('scripts')
    <script type="module">
    </script>
@endpush
