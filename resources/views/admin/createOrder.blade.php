@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Bestelling aanmaken</h1>

        <div class="row">
            <form method="POST" action="">
                @csrf
                <div class="form-group">
                    <label for="selectReservation">Reserveringen van vandaag</label>
                    <select multiple class="form-control" id="selectReservation">
                        @foreach($unsortedreservations as $reservation)
                        <option>{{$reservation->id}} {{$reservation->time}} - {{$reservation->user->name}} - @foreach($reservation->tables as $table) {{$table->id}} @endforeach</option>
                            @endforeach
                    </select>
                </div>
                <dishes-component></dishes-component>
            </form>
        </div>
    </div>
@endsection
