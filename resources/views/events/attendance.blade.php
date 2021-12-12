@extends('layouts.admin')

@section('title', __('Presence List') . ' - ')

@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">{{ __('Event') }}: {{ $event->name }}</h1>
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
            <a class="btn btn-primary btn-icon" href="#" role="button">
                <i class="fas fa-plus-circle"></i>
                {{ __('Save Presence List') }}
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">
                                <input class="checkAll" class="form-check-input" type="checkbox"
                                    style="transform: translateX(70%);" onclick=" checkAll(this)">
                            </th>
                            <th>{{ __('Participant') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">
                                <input class="checkAll" class="form-check-input" type="checkbox"
                                    onclick="checkAll(this)">
                            </th>
                            <th>{{ __('Participant') }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($participants as $participant)
                            <tr>
                                <td class="text-center">
                                    <input onclick="handleSelect(this)" class="form-check-input" type="checkbox"
                                        style="transform: translateX(100%);" value="{{ $participant->id }}">
                                </td>
                                <td>{{ $participant->user->name }}</td>
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
    <script>
        function checkAll(e) {
            var checkboxes = document.querySelectorAll('input[type=checkbox]');
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = e.checked;
            }
        }

        function handleSelect(e) {
            if (e.checked) {
                var checkboxes = document.querySelectorAll('input[type=checkbox].checkAll');
                for (var i = 0; i < checkboxes.length; i++) {
                    checkboxes[i].checked = false;
                }
            }
        }
    </script>
@endpush
