@extends('layouts.app')
c
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

                    <div class="error-actions w-25 mx-auto">
                        <form method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger float-right w-100">Verwijder account</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
