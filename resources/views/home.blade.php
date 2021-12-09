@extends(Auth::user() ? 'layouts.admin' : 'layouts.app')

@section('content')
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

    @if ($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <div class="container-fluid">
        <div class="ml-4 mb-4">
        </div>
        <br>
        @foreach ($events as $event)
            <div class="card shadow mb-4 mx-auto" style="max-width: 1300px">
                <div class="card-body" style="padding: 30px 60px 0px;">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div>
                                <img class="img-fluid rounded mx-auto d-block px-3 px-sm-4 mt-3 mb-4"
                                    style="width: 100%; max-width: 450px;" src="{{ asset($event->image_url) }}" alt="...">
                            </div>
                            <h3 class="m-0 font-weight-bold text-primary text-center">{{ $event->name }}</h3>
                            <div class="card-body px-5">
                                <div class="d-flex align-items-center">
                                    <p style="font-size: 18px">
                                        <span class="m-0 mr-2 text-uppercase">{{ __('Address') }}: </span>
                                        <span class="m-0">
                                            {{ ' R. ' . $event->address->street . ', ' . $event->address->number . ' ' . $event->address->district . ' - ' . $event->address->state }}
                                        </span>
                                    </p>
                                </div>
                                @if (isset($event->address->complement))
                                    <div class="d-flex align-items-center">
                                        <p style="font-size: 18px">
                                            <span class="m-0 mr-2 text-uppercase">
                                                {{ __('Local') }}:
                                            </span>
                                            <span class="m-0">
                                                {{ $event->address->complement }}
                                            </span>
                                        </p>
                                    </div>
                                @endif
                                <div class="d-flex align-items-center">
                                    <p style="font-size: 18px">
                                        <span class="m-0 mr-2 text-uppercase">{{ __('Date and Time') }}: </span>
                                        <span class="m-0">
                                            {{ $event->date . ' às ' . $event->start_time }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 text-center align-bottom row"
                            style="display: flex;flex-direction: column;padding: 40px 0;">
                            <div class="card-body">
                                <p style="font-size: 22px">{{ $event->description }}</p>
                            </div>
                            <div class="mt-auto ">
                                <h4 class="font-weight-bold pb-3">
                                    <strong>{{ __('Available Vacancies') }}</strong>:
                                    {{ $event->allAvailableVacancies }}
                                </h4>
                                @if (!Auth::user())
                                    <a href="{{ route('login') }}" class="btn btn-primary btn-user btn-block p-2">
                                        <h3 style="margin: 0">{{ __('Participate!') }}</h3>
                                    </a>
                                @else
                                    @if($event->isUserParticipating)
                                        <a href={{ route('user.agenda') }} class="btn btn-secondary btn-user btn-block p-2">
                                            <h3 style="margin: 0">{{ __('Registered') }}</h3>
                                        </a>
                                    @else
                                        <a href={{ route('events.participate', $event->id) }} data-toggle="modal"
                                            onclick="participate(&quot;{{ $event->id }}&quot;, &quot;{{{ $event->name }}}&quot;, &quot;{{ $event->date }}&quot;, &quot;{{ $event->start_time }}&quot;, &quot;{{ $event->address->fullAddress }}&quot;,&quot;{{ $event->local }}&quot;)"
                                            data-target="#participateModal" class="btn btn-primary btn-user btn-block p-2">
                                            <h3 style="margin: 0">{{ __('Participate!') }}</h3>
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @if ($events->total() == 0)
            <br><br><br><br><br><br><br><br>
            <div class="ml-4 mb-4 text-center mt-4">
                <i class="fas fa-search mb-2" style="font-size: 40px;color: aliceblue"></i>
                <h5 style="color: aliceblue">{{ __('No events available.') }}</h5>
            </div>
        @endif


        @if ($events->lastPage() > 1)
            <nav class="d-flex" aria-label="Page navigation example">
                <ul class="pagination mx-auto" style="border: 1px solid #fff">
                    <li class="page-item"><a class="page-link"
                            href="{{ $events->previousPageUrl() }}">{{ __('Previous') }}</a>
                    </li>
                    @for ($i = 1; $i <= $page_count; $i++)
                        <li class="page-item {{ $page == $i ? 'active' : '' }}"><a class="page-link"
                                href="{{ $events->url($i) }}">{{ $i }}</a></li>
                    @endfor
                    <li class="page-item"><a class="page-link"
                            href="{{ $events->nextPageUrl() }}">{{ __('Next') }}</a>
                    </li>
                </ul>
            </nav>
        @endif
        {{-- Modal Inscricao --}}
        <div class="modal" id="participateModal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Confirmation') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="participateForm" action="{{ route('events.participate', 'id') }}"></form>
                        <p>
                            Você confirma sua inscrição no evento <strong id="event-name">EVENTO 01</strong>,
                                    que acontecerá no dia <span id="event-date">27/10/2021</span> às <span
                                        id="event-time">19:00</span> no
                                    endereço <span id="event-adress">Rua 01, s/n - Indaiá</span> <span
                                        id="event-local-all">no local <span id="event-local">Prédio Azul?</span></span>
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancel') }}</button>
                        <button type="button" onclick="document.querySelector('#participateForm').submit()"
                            class="btn btn-primary">{{ __('Confirm') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function participate(id, name, date, time, address, local) {
            console.log(id, name, date, time, address, local);
            document.querySelector('#participateForm').action = document.querySelector('#participateForm').action.replace(
                /eventos\/.+\/participar/, `eventos/${id}/participar`);
            document.querySelector('#event-name').innerHTML = name;
            document.querySelector('#event-date').innerHTML = date;
            document.querySelector('#event-time').innerHTML = time;
            document.querySelector('#event-adress').innerHTML = address;
            if (local) {
                document.querySelector('#event-local').innerHTML = local;
            } else {
                document.querySelector('#event-local-all').style.display = 'none';
            }
        }
    </script>
@endpush
