@extends('layouts.admin')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Eventos</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
    For more information about DataTables, please visit the <a target="_blank"
        href="https://datatables.net">official DataTables documentation</a>.</p>

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-primary btn-icon" href="{{ route('eventos.create') }}" role="button">
            <i class="fas fa-plus-circle"></i>
            Novo Evento
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nome do Evento</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th class="text-center">Açōes</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nome do Evento</th>
                        <th>Data</th>
                        <th>Hora</th>
                        <th class="text-center">Açōes</th>
                    </tr>
                </tfoot>
                <tbody>
                    {{-- Eventos --}}
                    @foreach ($eventos as $evento)
                        <tr>
                            <td class="text-center">{{ $evento->id }}</td>
                            <td>{{ $evento->nome }}</td>
                            <td>{{ date('d/m/Y', strtotime($evento->data)) }}</td>
                            <td>{{ date('h:i', strtotime($evento->hora)) }}</td>
                            <td class="text-center">
                                <a href="{{ route('eventos.edit', ['id' => $evento->id]) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('eventos.destroy') }}" data-toggle="modal" data-target="#deleteModal"
                                    onclick="document.getElementById('event-id').value = {{ $evento->id }}">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
     <!-- delete Modal-->
     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Tem certeza?</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">Confirme abaixo se deseja excluir este evento.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary"
                     aria-labelledby="navbarDropdown"
                     href="{{ route('eventos.destroy') }}"
                     onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                     {{ __('Delete') }}
                 </a>
                 <form id="delete-form" action="{{ route('eventos.destroy') }}" method="POST" class="d-none">
                     @csrf
                        <input id="event-id" type="hidden" name="id" value="">
                 </form>
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
