@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Admin Bestellingen</h1>
        </div>
        <ul>
            @foreach($reservations as $reservation)
                <li>
                    {{$reservation->date}}
                </li>
                <li>
                    {{$reservation->time}}
                </li>
                <li>
                    {{$reservation->comment}}
                </li>
            @endforeach
        </ul>
    </div>
@endsection
