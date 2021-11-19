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
        <a class="btn btn-primary btn-icon" href="{{ route('eventos.novo') }}" role="button">
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
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nome de Usuário</th>
                        <th>Tipo</th>
                        <th class="text-center">Açōes</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="text-center">ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Nome de Usuário</th>
                        <th>Tipo</th>
                        <th class="text-center">Açōes</th>
                    </tr>
                </tfoot>
                <tbody>
                    {{-- Eventos --}}
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td class="text-center">{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->username }}</td>
                            <td class="text-center">
                                <a href="{{ route('usuarios.editar', ['id' => $usuario->id]) }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('usuarios.deletar') }}" data-toggle="modal" data-target="#deleteModal"
                                    onclick="document.getElementById('usuario-id').value = {{ $usuario->id }}">
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
             <div class="modal-body">Confirme abaixo se deseja excluir este usuario.</div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                 <a class="btn btn-primary"
                     aria-labelledby="navbarDropdown"
                     href="{{ route('usuarios.deletar') }}"
                     onclick="event.preventDefault();document.getElementById('delete-form').submit();">
                     {{ __('Delete') }}
                 </a>
                 <form id="delete-form" action="{{ route('usuarios.deletar') }}" method="POST" class="d-none">
                     @csrf
                        <input id="usuario-id" type="hidden" name="id" value="">
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
