@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Wijzig {{$user->name}}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <form class="col-md-12" method="post" action="{{ route('users.update', $user) }}">
                @csrf
                @method('patch')

                <div class="form-group">
                    <label for="name">name</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="{{$user->name}}">
                </div>

                <div class="form-group">
                    <label for="infix">infix</label>
                    <input class="form-control" id="infix" name="infix" type="text"
                           placeholder="{{$user->infix}}">
                </div>

                <div class="form-group">
                    <label for="surname">surname</label>
                    <input class="form-control" id="surname" name="surname" type="text"
                           placeholder="{{$user->surname}}">
                </div>

                <div class="form-group">
                    <label for="telephone">telephone</label>
                    <input class="form-control" id="telephone" name="telephone" type="text"
                           placeholder="{{$user->telephone}}">
                </div>

                <div class="form-group">
                    <label for="zipcode">zipcode</label>
                    <input class="form-control" id="zipcode" name="zipcode" type="text"
                           placeholder="{{$user->zipcode}}">
                </div>

                <div class="form-group">
                    <label for="city">city</label>
                    <input class="form-control" id="city" name="city" type="text" placeholder="{{$user->city}}">
                </div>

                <div class="form-group">
                    <label for="address">address</label>
                    <input class="form-control" id="address" name="address" type="text" placeholder="{{$user->address}}">

                </div>

                <div class="form-group">
                    <label for="email">email</label>
                    <input class="form-control" id="email" name="email" type="text" placeholder="{{$user->email}}">
                </div>

                <div class="form-group">
                    <label for="isadmin">isadmin</label>
                    <select class="form-control" id="isadmin" name="isadmin">

                        <option value="0" @if($user->isadmin == 0) selected @endif>Gebruiker</option>
                        <option value="1" @if($user->isadmin == 1) selected @endif>Admin</option>

                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
@endsection
