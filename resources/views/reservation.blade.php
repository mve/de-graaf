@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Nieuwe reservering</h1>
            <reservation-component v-bind:tables='@json($tables)'></reservation-component>
        </div>
    </div>
@endsection
