@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Account</h1>


            <form method="post" action="{{route('account.edit', $user)}}">
                {{ csrf_field() }}
                {{ method_field('patch') }}



                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Voornaam') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" value="{{ $user->name }}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="infix" class="col-md-4 col-form-label text-md-right">{{ __('Tussenvoegsel') }}</label>

                    <div class="col-md-3">
                        <input id="infix" type="text" value="{{ $user->infix }}"class="form-control" name="infix" value="{{ old('infix') }}"  autocomplete="infix" autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Achternaam') }}</label>

                    <div class="col-md-6">
                        <input id="surname" type="text"  value="{{ $user->surname }}" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                        @error('surname')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" value="{{ $user->email }}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                    </div>
                </div>



                <div class="form-group row">
                    <label for="telephone" class="col-md-4 col-form-label text-md-right">{{ __('Telefoon nummer') }}</label>

                    <div class="col-md-6">
                        <input id="telephone" type="text" value="{{ $user->telephone }}" class="form-control  @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone" autofocus>
                        @error('telephone')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group row">
                    <label for="adress" class="col-md-4 col-form-label text-md-right">{{ __('Adres') }}</label>

                    <div class="col-md-6">
                        <input id="adress" type="text" value="{{ $user->adress }}"class="form-control  @error('adress') is-invalid @enderror" name="adress" placeholder="Straat" value="{{ old('adress') }}" required autocomplete="adress" autofocus>
                        @error('adress')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Postcode en plaats') }}</label>

                    <div class="col-md-3">
                        <input id="zipcode" value="{{ $user->zipcode }}"type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" placeholder="Postcode" value="{{ old('zipcode') }}" required autocomplete="city" autofocus>

                        @error('zipcode')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <input id="city" type="text" value="{{ $user->city }}" class="form-control @error('city') is-invalid @enderror" name="city"  placeholder="plaats" value="{{ old('city') }}" required autocomplete="city" autofocus>

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
    </div>
@endsection
