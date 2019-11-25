@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Reserveringen</h1>
            <table class="table">
                <tr><th class="d-lg-none" colspan="2">Reserveringen</th><th class="d-none d-lg-table-cell">Datum</th><th class="d-none d-lg-table-cell">Tijd</th><th class="d-none d-lg-table-cell">Aantal personen</th><th class="d-none d-lg-table-cell">Opmerking</th><th class="d-none d-lg-table-cell">Tafel</th><th>Nota</th>
                @foreach($user->reservations as $reservation)
                    <tr>

                        <td  class="d-none d-lg-table-cell">{{$reservation->date}}</td>
                        <td class="d-none d-lg-table-cell">
                            {{$reservation->time}}
                        </td>
                        <td class="d-lg-none"><b>Datum:<br></b>{{$reservation->date}}<br> <b>Tijd<br></b>{{$reservation->time}}</td>

                        <td class="d-lg-none"> <b>Aantal personen:<br></b>{{$reservation->people}}<b><br>Tafels:<br></b>@foreach($reservation->tables as $table)
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
                            <a href="reservering/nota/{{$reservation->id}}">PDF</a>
                        </td>

                        <td class="d-none d-lg-table-cell">
                            @foreach($reservation->tables as $table)
                                {{$table->id}}<br>
                            @endforeach

                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
