@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Reserveringen</h1>
            <table class="table">
                <tr><th>Datum</th><th>Tijd</th><th>Aantal personen</th><th>Opmerking</th><th>Tafel</th>
                @foreach($user->reservations as $reservation)
                    <tr>
                        <td>
                            {{$reservation->date}}
                        </td>
                        <td>
                            {{$reservation->time}}
                        </td>
                        <td>
                            {{$reservation->people}}
                        </td>
                        <td>
                            {{$reservation->comment}}
                        </td>
                        <td>
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
