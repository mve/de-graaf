@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>
                        Sorry..</h1>
                    <h2>
                        Dit account is geblokkeerd</h2>
                    <div class="error-details">
                        Om je account te herstellen moet je je wachtwoord reseten, werkt dit niet neem dan contact op
                        met de beheerder.
                    </div>
                    <div class="error-actions">
                        <a href="{{ url('/password/reset') }}" class="btn btn-primary btn-lg"><span
                                class="glyphicon glyphicon-home"></span>
                            Herstel wachtwoord </a><a href="{{ url('/password/reset') }}" class="btn btn-default btn-lg"><span
                                class="glyphicon glyphicon-envelope"></span> Neem contact op </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
