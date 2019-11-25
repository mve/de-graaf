@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ __('Verifieer jou emailadres') }}</h2>
            <div class="card">


                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Een nieuwe link is naar jou emailadres gestuurd.') }}
                        </div>
                    @endif
<b>
                    {{ __('Voordat je verder gaat moet je je email verifieren.') }}
    <br></b>
                    Geen mail Ontvangen?<br>

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-lg align-baseline mt-4">{{ __('Verstuur nieuwe email') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
