@extends('layouts.admin')

@section('title', __('HeadOffices') . ' - ')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ __('HeadOffices') }}</h1>
    <p class="mb-4"></p>

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
            {{ __(session('warning')) }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a class="btn btn-primary btn-icon" href="{{ route('headOffice.store') }}" role="button">
                <i class="fas fa-plus-circle"></i>
                {{ __('New HeadOffice') }}
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>{{ __('HeadOffice Name') }}</th>
                            <th>{{ __('HeadOffice Description') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th class="text-center">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>{{ __('HeadOffice Name') }}</th>
                            <th>{{ __('HeadOffice Description') }}</th>
                            <th>{{ __('Address') }}</th>
                            <th class="text-center">{{ __('Actions') }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        {{-- Eventos --}}
                        @foreach ($headOffices as $headOffice)
                            <tr>
                                <td class="text-center">{{ $headOffice->id }}</td>
                                <td>{{ $headOffice->name }}</td>
                                <td>{{ $headOffice->description }}</td>
                                <td>{{ $headOffice->address->fullAddress }}</td>

                                <td class="text-center">
                                    <a href="{{ route('headOffice.update', ['id' => $headOffice->id]) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('headOffice.delete', ['id' => $headOffice->id]) }}"
                                        data-toggle="modal" data-target="#deleteModal"
                                        onclick="document.querySelector('#deleteButton').href = this.href">
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
                        <h5 class="modal-title" id="exampleModalLabel">{{ __('Are you sure?') }}</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">??</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{ __('Please confirm below if you want to delete this event.') }}</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <a id="deleteButton" class="btn btn-primary" aria-labelledby="navbarDropdown" href="#">
                            {{ __('Delete') }}
                        </a>
                        <input id="event-id" type="hidden" name="id" value="">
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
