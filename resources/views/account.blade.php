@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Account</h1>

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
            <div class="col-md-12">
                <form method="post" action="{{route('users.update', $user)}}">
                    @csrf
                    @method('patch')

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Voornaam') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" value="{{ $user->name }}"
                                   class="form-control @error('name') is-invalid @enderror" name="name"
                                   value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="infix"
                               class="col-md-4 col-form-label text-md-right">{{ __('Tussenvoegsel') }}</label>

                        <div class="col-md-3">
                            <input id="infix" type="text" value="{{ $user->infix }}" class="form-control" name="infix"
                                   value="{{ old('infix') }}" autocomplete="infix" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="surname"
                               class="col-md-4 col-form-label text-md-right">{{ __('Achternaam') }}</label>

                        <div class="col-md-6">
                            <input id="surname" type="text" value="{{ $user->surname }}"
                                   class="form-control @error('surname') is-invalid @enderror" name="surname"
                                   value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="email"
                               class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" value="{{ $user->email }}"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password"
                               class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                               class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation"
                                   autocomplete="new-password">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="telephone"
                               class="col-md-4 col-form-label text-md-right">{{ __('Telefoon nummer') }}</label>

                        <div class="col-md-6">
                            <input id="telephone" type="text" value="{{ $user->telephone }}"
                                   class="form-control  @error('telephone') is-invalid @enderror" name="telephone"
                                   value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>
                            @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                        <div class="col-md-6">
                            <input id="address" type="text" value="{{ $user->address }}"
                                   class="form-control  @error('address') is-invalid @enderror" name="address"
                                   placeholder="Straat" autocomplete="address" autofocus>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name"
                               class="col-md-4 col-form-label text-md-right">{{ __('Postcode en plaats') }}</label>

                        <div class="col-md-3">
                            <input id="zipcode" value="{{ $user->zipcode }}" type="text"
                                   class="form-control @error('zipcode') is-invalid @enderror" name="zipcode"
                                   placeholder="Postcode" value="{{ old('zipcode') }}" required autocomplete="city"
                                   autofocus>

                            @error('zipcode')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="col-md-3">
                            <input id="city" type="text" value="{{ $user->city }}"
                                   class="form-control @error('city') is-invalid @enderror" name="city"
                                   placeholder="plaats"
                                   value="{{ old('city') }}" required autocomplete="city" autofocus>

                            @error('city')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Opslaan
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        <div class="col-md-12 mt-3">
            <table class="table">
                <tr>
                    <th class="d-lg-none" colspan="2">Reserveringen</th>
                    <th class="d-none d-lg-table-cell">Datum</th>
                    <th class="d-none d-lg-table-cell">Tijd</th>
                    <th class="d-none d-lg-table-cell">Aantal personen</th>
                    <th class="d-none d-lg-table-cell">Opmerking</th>
                    <th class="d-none d-lg-table-cell">Tafel</th>
                    <th class="d-none d-lg-table-cell">Nota</th>

                    <th class="d-none d-lg-table-cell">Annuleren</th>
                @foreach($user->reservations as $reservation)
                    <tr>

                        <td class="d-none d-lg-table-cell">{{$reservation->date}}</td>
                        <td class="d-none d-lg-table-cell">
                            {{$reservation->time}}
                        </td>
                        <td class="d-lg-none"><b>Datum:<br></b>{{$reservation->date}}<br>
                            <b>Tijd<br></b>{{$reservation->time}}</td>

                        <td class="d-lg-none"><b>Aantal personen:<br></b>{{$reservation->people}}
                            <b><br>Tafels:<br></b>@foreach($reservation->tables as $table)
                                {{$table->id}}<br>
                            @endforeach<br>
                            <a href="reservering/nota/{{$reservation->id}}">PDF</a>

                            <button class="btn-primary">Annuleren</button>
                        </td>


                        <td class="d-none d-lg-table-cell">
                            {{$reservation->people}}
                        </td>
                        <td class="d-none d-lg-table-cell">
                            {{$reservation->comment}}
                        </td>
                        <td class="d-none d-lg-table-cell">
                            @foreach($reservation->tables as $table)
                                {{$table->id}}<br>
                            @endforeach

                        </td>
                        <td class="d-none d-lg-table-cell">
                            <a href="reservering/nota/{{$reservation->id}}">PDF</a>

                        </td>

                        <td class="d-none d-lg-table-cell">
                            <a  href="account/delete/{{$reservation->id}}"><button onclick="return confirm('Weet je het zeker?')" class="button button__delete"><i class="fa fa-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
            </table>
            @if($errors->any())
                <h4>{{$errors->first()}}</h4>
            @endif
        </div>
    </div>
    </div>

@endsection
