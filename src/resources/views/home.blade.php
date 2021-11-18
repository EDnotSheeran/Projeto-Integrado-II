@extends('layouts.admin')

@section('content')

<h1>
    {{ Auth::user()->name }}
    teste
</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Você está logado!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script type="module">
    // Call the dataTables jQuery plugin
    $(document).ready(function() {
    $('#dataTable').DataTable();
    });
    </script>
@endpush
