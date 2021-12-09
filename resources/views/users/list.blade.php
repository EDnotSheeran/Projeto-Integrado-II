@extends('layouts.admin')

@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ __('Users') }}</h1>
    <p class="mb-4"></p>

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
            <a class="btn btn-primary btn-icon" href="{{ route('user.store') }}" role="button">
                <i class="fas fa-plus-circle"></i>
                {{ __('New User') }}
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('User Name') }}</th>
                            <th>{{ __('City Hall employee') }}</th>
                            <th>{{ __('Role') }}</th>
                            <th class="text-center">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">ID</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('User Name') }}</th>
                            <th>{{ __('City Hall employee') }}</th>
                            <th>{{ __('Role') }}</th>
                            <th class="text-center">{{ __('Actions') }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        {{-- Usuários --}}
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-center">{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->job_id !== null ? __('Yes') : __('No') }}</td>
                                <td>{{ __($user->role) }}</td>
                                <td class="text-center">
                                    <a href="{{ route('user.update', ['id' => $user->id]) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    @if ($user->id !== Auth::user()->id)
                                        <a href="{{ route('user.delete', ['id' => $user->id]) }}" data-toggle="modal"
                                            data-target="#deleteModal"
                                            onclick="document.querySelector('#deleteButton').href = this.href">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endif
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
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">{{ __('Please confirm below if you want to delete this user.') }}</div>
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
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endpush
