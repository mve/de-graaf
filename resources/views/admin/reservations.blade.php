@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Admin reserveringen</h1>
        </div>
        <table class="table">
            <tr><th>Datum</th><th>Tijd</th><th>Aantal personen</th><th>Opmerking</th>
            @foreach($reservations as $reservation)
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
               </tr>
            @endforeach
        </table>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">    {!! $reservations->links() !!}</div>
        </div>
    </div>
@endsection
