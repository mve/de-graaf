@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Admin reserveringen</h1>
        </div>
        <table class="table">
            <tr>
                <th class="d-lg-none" colspan="2">Reserveringen</th>
                <th class="d-none d-lg-table-cell">Datum</th>
                <th class="d-none d-lg-table-cell">Tijd</th>
                <th class="d-none d-lg-table-cell">Aantal personen</th>
                <th class="d-none d-lg-table-cell">Opmerking</th>
                <th class="d-none d-lg-table-cell">Tafel</th>
{{--                <th class="d-none d-lg-table-cell">acties</th>--}}
            </tr>
            @foreach($reservations as $reservation)
                <tr>
                    <td class="d-none d-lg-table-cell">{{$reservation->date}}</td>
                    <td class="d-none d-lg-table-cell">
                        {{$reservation->time}}
                    </td>
                    <td class="d-lg-none"><b>Datum:<br></b>{{$reservation->date}}<br>
                        <b>Tijd<br></b>{{$reservation->time}}</td>

                    <td class="d-lg-none"><b>Aantal personen:<br></b>{{$reservation->people}}
                        <b><br>Tafels:<br></b>@foreach($reservation->tables as $table)
                            {{$table->id}}<br>
                        @endforeach
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
{{--                    <td class="d-none d-lg-table-cell">--}}
{{--                        <a href="{{route('reservation.adminUpdate', $reservation)}}">Wijzigen</a>--}}
{{--                    </td>--}}
                </tr>
            @endforeach
        </table>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">    {!! $reservations->links() !!}</div>
        </div>
    </div>
@endsection
