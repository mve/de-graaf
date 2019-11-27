@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <h1>Admin reserveringen</h1>

            <a href="{{ url('/beheer/reserveren') }}">
            <button class="btn btn-success">
                    reservering plaatsen
            </button>
            </a>

        </div>

        <div class="space space--30"></div>

        <div class="row">

            <div class="col-lg-3 card-container scale-animation">
                <a href="{{ url('/beheer/reserveringen')  }}" class="card pointer border-top">
                    <div class="card-content-admin-container--small">
                        <div class="ard-content-admin">
                            <h4>Alles</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 card-container scale-animation">
                <a href="{{ url('/beheer/reserveringen/dag')  }}" class="card pointer border-top">
                    <div class="card-content-admin-container--small">
                        <div class="ard-content-admin">
                            <h4>Vandaag</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 card-container scale-animation">
                <a href="{{ url('/beheer/reserveringen/week') }}" class="card pointer border-top">
                    <div class="card-content-admin-container--small">
                        <div class="card-content-admin">
                            <h4>Komende week</h4>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-3 card-container scale-animation">
                <a href="{{ url('/beheer/reserveringen/maand')  }}" class="card pointer border-top">
                    <div class="card-content-admin-container--small">
                        <div class="card-content-admin">
                            <h4>Komende maand</h4>
                        </div>
                    </div>
                </a>
            </div>

{{--            <div class="col-lg-3 card-container scale-animation">--}}
{{--                <a href="{{ url('/beheer/reserveren') }}" class="card pointer border-top">--}}
{{--                    <div class="card-content-admin-container">--}}
{{--                        <div class="card-content-admin">--}}
{{--                            <h4>Speciale reservering plaatsen</h4>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}

        </div>



        <table class="table">
            <tr>
                <th class="d-lg-none" colspan="2">Reserveringen</th>
                <th class="d-none d-lg-table-cell">Datum</th>
                <th class="d-none d-lg-table-cell">Tijd</th>
                <th class="d-none d-lg-table-cell">Aantal personen</th>
                <th class="d-none d-lg-table-cell">Opmerking</th>
                <th class="d-none d-lg-table-cell">Tafel</th>
                <th class="d-none d-lg-table-cell">Nota</th>
                <th class="d-none d-lg-table-cell">Acties</th>
            </tr>

            @foreach($reservations as $reservation)
                <tr>
                    <td class="d-none d-lg-table-cell">
                        {{$reservation->date}}
                    </td>
                    <td class="d-none d-lg-table-cell">
                        {{$reservation->time}}
                    </td>
                    <td class="d-lg-none">
                        <b>Datum:<br></b>
                        {{$reservation->date}}<br>
                        <b>Tijd</b><br>
                        {{$reservation->time}}
                    </td>
                    <td class="d-lg-none">
                        <b>Aantal personen:<br></b>
                        {{$reservation->people}}<br>
                        <b>Tafels:</b><br>
                        @foreach($reservation->tables as $table)
                            {{$table->id}}<br>
                        @endforeach
                        <a href="reservering/nota/{{$reservation->id}}">PDF</a>
                    </td>
                    <td class="d-none d-lg-table-cell">
                        {{$reservation->people}}
                    </td>
                    <td class="d-none d-lg-table-cell">
                        {{$reservation->comment}}
                    </td>
                    <td class="d-none d-lg-table-cell">
                        @foreach($reservation->tables as $table)
                            {{$table->id}}<br>
                        @endforeach
                    </td>
                    <td class="d-none d-lg-table-cell">
                        <a href="reservering/nota/{{$reservation->id}}">PDF</a>
                    </td>
                    <td class="d-none d-lg-table-cell">
                        <form method="post" action="/beheer/reservering/{{$reservation->id}}">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn btn-danger button__delete">
                                <i class="fa fa-trash"></i>
                            </button>

                        </form>

                        {{--                            <a href="{{url('/beheer/reservering/' . $reservation->id)}}">--}}
                        {{--                                <button class="btn btn-danger button__delete">--}}
                        {{--                                    <i class="fa fa-trash"></i>--}}
                        {{--                                </button>--}}
                        {{--                            </a>--}}

                    </td>
                </tr>
            @endforeach
        </table>

        <div class="row d-flex justify-content-center">
            <div class="col-md-6">    {!! $reservations->links() !!}</div>
        </div>
    </div>
@endsection
