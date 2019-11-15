@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Admin Home</h1>
            <a class="nav-link" href="{{ url('/beheer/bestellingen') }}">Bestellingen</a>
            <a class="nav-link" href="{{ url('/beheer/reserveringen') }}">Reserveringen</a>
            <a class="nav-link" href="{{ url('/beheer/gebruikers') }}">Gebruikers</a>
        </div>
    </div>
@endsection
