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
            <button id="print-btn" class="btn btn-primary btn-icon" role="button">
                <i class="fas fa-print"></i>
                {{ __('Print') }}
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">
                                <div class="custom-control custom-checkbox small">
                                    <input class="custom-control-input checkAll" type="checkbox" name="kind" id="kind">

                                    <label class="custom-control-label" for="kind" style="line-height: 26px;">
                                    </label>
                                </div>
                            </th>
                            <th>{{ __('Participant') }}</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="text-center">
                                <div class="custom-control custom-checkbox small">
                                    <input class="custom-control-input checkAll" type="checkbox" name="kind" id="kind">

                                    <label class="custom-control-label" for="kind" style="line-height: 26px;">
                                    </label>
                                </div>
                            </th>
                            <th>{{ __('Participant') }}</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($participants as $participant)
                            <tr>
                                <td class="text-center">
                                    <div class="custom-control custom-checkbox small">
                                        <input class="custom-control-input" type="checkbox"
                                            {{ $participant->checked_in_at !== null ? 'checked' : '' }}
                                            id="participant-{{ $participant->id }}" value="{{ $participant->id }}">

                                        <label class="custom-control-label" for="participant-{{ $participant->id }}"
                                            style="line-height: 26px;">
                                        </label>
                                    </div>
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
    <div>
        <a class="btn btn-primary btn-icon" href="{{ route('events') }}" role="button">
            <i class="fas fa-arrow-left"></i>
            {{ __('Back') }}
        </a>
    </div>
@endsection

@push('scripts')
    <script type="module">
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
    <script type="module">
        // Call the dataTables jQuery plugin
        $(document).ready(function() {

            function areAllChecked() {
                const checkboxes = Array.from(document.querySelectorAll(
                    'input[type=checkbox]:not(.checkAll)'))
                return checkboxes.every(checkbox => checkbox.checked);
            }

            function checkAll(checked) {
                document.querySelectorAll('input[type=checkbox]').forEach(element => {
                    element.checked = checked;
                });
            }

            function getValues() {
                const values = [];
                document.querySelectorAll('input[type=checkbox]:not(.checkAll):checked').forEach(element => {
                    values.push(element.value);
                });
                return values;
            }

            if (areAllChecked()) {
                $('.checkAll').prop('checked', true);
            }

            document.querySelectorAll('input[type=checkbox]').forEach(element => {
                element.addEventListener('click', function(e) {
                    document.querySelectorAll('.checkAll').forEach(element => {
                        element.checked = areAllChecked();
                    });

                    if (e.target.classList.contains('checkAll')) {
                        checkAll(!e.target.checked);
                    }


                    axios
                        .post('{{ route('events.presenceList', $event->id) }}', {
                            ids: getValues()
                        })
                        .then((response) => {
                            // console.log(response);
                        })
                        .catch((error) => {
                            console.log(error);
                        });

                });
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.5.0-beta4/html2canvas.min.js"
        integrity="sha512-OqcrADJLG261FZjar4Z6c4CfLqd861A3yPNMb+vRQ2JwzFT49WT4lozrh3bcKxHxtDTgNiqgYbEUStzvZQRfgQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="module">
        async function printPresenceList() {
            const print = document.createElement('div');
            print.innerHTML = `
                <h1>{{ __('Event') }}: {{ $event->name }}</h1>
                <h2>{{ __('Date and Time') }}: {{ $event->date }} às {{ $event->time }}</h2>
                <h2>{{ __('Duration') }}: {{ $event->duration }}</h2>
                <h2>{{ __('Address') }}: {{ $event->address->full_address }}</h2>

            `;
            const headers = ['Numero', 'Nome', 'Assinatura'];
            const checkboxes = Array.from(document.querySelectorAll(
                'input[type=checkbox]:checked:not(.checkAll)'))

            const table = document.createElement('table');
            print.appendChild(table);
            const thead = document.createElement('thead');
            table.appendChild(thead);
            const tbody = document.createElement('tbody');
            table.appendChild(tbody);

            const tr = document.createElement('tr');
            thead.appendChild(tr);

            headers.map(header => {
                const th = document.createElement('th');
                th.innerHTML = header;
                tr.appendChild(th);
            });

            let participants = (await axios.get("{{ route('events.participants', $event->id) }}")).data;
            participants = participants.filter(participant => participant.checked_in_at !== null);
            participants = participants.map(participant => participant.user.name);
            participants = participants.sort();

            participants.map(participant => {
                const tr = document.createElement('tr');
                tbody.appendChild(tr);

                const td = document.createElement('td');
                td.innerHTML = participants.indexOf(participant) + 1;
                tr.appendChild(td);

                const td2 = document.createElement('td');
                td2.innerHTML = participant;
                tr.appendChild(td2);

                const td3 = document.createElement('td');
                td3.innerHTML = '<span style="border-bottom: 2px solid #aaa;"></span>';
                tr.appendChild(td3);

            });

            const style = `
                <style>
                    * {
                        margin: 0;
                    }

                    h1 {
                        text-align: center;
                        margin: 10px;
                        color: #444;
                        margin-bottom: 1.2cm;
                    }

                    h2 {
                        margin: 10px;
                        font-size: 18px;
                        color: #555;
                    }

                    h2:last-of-type {
                        margin-bottom: 1.2cm;
                    }

                    body {
                        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                        background-color: #333;
                    }

                    body > div {
                        max-width: 28cm;
                        margin: 0 auto;
                        min-height: 100vh;
                        background-color: #fff;
                        padding: 1cm;
                        box-sizing: border-box;
                    }

                    table {
                    width: 100%;
                    border-collapse: collapse;
                    }

                    table td,
                    table th {
                    border: 1px solid #ddd;
                    padding: 8px;
                    }

                    table tr:nth-child(even) {
                    background-color: #f2f2f2;
                    }

                    table tr:hover {
                    background-color: #ddd;
                    }

                    table th {
                    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: left;
                    background-color: #83B7C8;
                    color: white;
                    }

                    table td {
                    padding-top: 12px;
                    padding-bottom: 12px;
                    text-align: left;
                    background-color: #f2f2f2;
                    color: black;
                    }

                    table tr:nth-child(even) {
                    background-color: #f2f2f2;
                    }

                    table tr:hover {
                    background-color: #ddd;
                    }

                </style>`;

            var a = window.open('', '_blank');
            a.document.body.innerHTML = style;
            a.document.body.appendChild(print);
            // a.print();
        }

        $(document).ready(function() {
            document.querySelector('#print-btn').addEventListener('click', printPresenceList)
        });
    </script>
@endpush
