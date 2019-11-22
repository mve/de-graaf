@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>
                        Sorry..</h1>
                    <h2>
                        Dit account is geblokkeerd door de beheerder</h2>
                    <div class="error-details">
                       Neem contact op met de beheerder!
                    </div>
                    <div class="error-actions">
                        <a href="{{ url('/contact') }}" class="btn btn-primary btn-lg"><span
                                class="glyphicon glyphicon-home"></span>
                            Neem contact op </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
