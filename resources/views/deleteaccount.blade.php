@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-template">
                    <h1>
                       Weet je zeker dat je je account wilt verwijderen?</h1>

                    <div class="error-details">
                        Nadat je je account hebt verwijderd is het niet meer mogelijk om deze te herstellen!<br>
                        Alle toekomstige reserveringen blijven wel bestaan, deze kun je zonder account niet annuleren.
                    </div>

                    <div class="error-actions">
                        <form method="post" action="/delete-account">
                            @csrf
                            @method('DELETE')

                            <div class="form-group recaptcha-container">
                                @if(env('GOOGLE_RECAPTCHA_KEY'))
                                    <div class="g-recaptcha"
                                         data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}">
                                    </div>
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-danger w-25">Verwijder account</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
