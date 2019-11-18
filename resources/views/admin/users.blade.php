@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Gebruikers</h1>
        <div class="row">

            @foreach($users as $user)
                <div class="col-md-2">
                    <button class="btn btn-primary">Wijzigen</button>
                </div>
                <div class="col-md-10">
                    {{$user->name}}
                </div>
            @endforeach

        </div>
    </div>
@endsection
