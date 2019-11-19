@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Admin Gebruikers</h1>
        <div class="row">

            @foreach($users as $user)
                <div class="col-md-2">
                    <a href="{{route('users.adminUpdate', $user)}}">Wijzigen</a>
                </div>
                <div class="col-md-10">
                    {{$user->name}}
                </div>
            @endforeach

        </div>
    </div>
@endsection
