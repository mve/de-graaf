@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Home</h1>

        <div class="row">

            <div class="col-lg-6 card-container scale-animation">

                <a href="{{ url('/beheer/bestellingen') }}" class="card pointer border-top">

                    <div class="row card-content-admin-container">

                        <div class="col-9 card-content-admin">
                            <h3>Bestellingen</h3>
                        </div>

                        <div class="col-3 icon-container">
                            <h1 class="icon-large"><i class="fas fa-clipboard-list"></i></h1>
                        </div>

                    </div>

                </a>

            </div>

            <div class="col-lg-6 card-container scale-animation">

                <a href="{{ url('/beheer/reserveringen') }}" class="card pointer border-top">

                    <div class="row card-content-admin-container">

                        <div class="col-9 card-content-admin">
                            <h3>Reserveringen</h3>
                        </div>

                        <div class="col-3 icon-container">
                            <h1 class="icon-large"><i class="fas fa-calendar-alt"></i></h1>
                        </div>

                    </div>

                </a>

            </div>

            <div class="col-lg-6 card-container scale-animation">

                <a href="{{ url('/beheer/gebruikers') }}" class="card pointer border-top">

                    <div class="row card-content-admin-container">

                        <div class="col-9 card-content-admin">
                            <h3>Gebruikers</h3>
                        </div>

                        <div class="col-3 icon-container">
                            <h1 class="icon-large"><i class="fas fa-users"></i></h1>
                        </div>

                    </div>

                </a>

            </div>
            <div class="col-lg-6 card-container scale-animation">

                <a href="{{ url('/beheer/gerechten') }}" class="card pointer border-top">

                    <div class="row card-content-admin-container">

                        <div class="col-9 card-content-admin">
                            <h3>Gerechten</h3>
                        </div>

                        <div class="col-3 icon-container">
                            <h1 class="icon-large"><i class="fas fa-utensils"></i></h1>
                        </div>

                    </div>

                </a>

            </div>

        </div>

    </div>
@endsection
