@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Bestelling aanmaken</h1>

        <div class="row">
            <form method="POST"  class="w-100" action="">
                @csrf
{{--                <div class="form-group">--}}
{{--                    <label for="selectReservation">Reserveringen van vandaag</label>--}}
{{--                    <select multiple class="form-control" id="selectReservation" name="selectReservation">--}}
{{--                        @foreach($unsortedreservations as $reservation)--}}
{{--                        <option value="{{$reservation->id}}">{{$reservation->id}} {{$reservation->time}} - {{$reservation->user->name}} - @foreach($reservation->tables as $table) {{$table->id}} @endforeach</option>--}}
{{--                            @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
                <dishes-component v-bind:unsortedreservations='@json($unsortedreservations)'></dishes-component>
            </form>
        </div>
    </div>
@endsection
