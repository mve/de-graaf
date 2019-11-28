@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="h1-responsive font-weight-bold text-center my-4">Neem contact op met ons</h2>

        <p class="text-center w-responsive mx-auto mb-5">
            Heb je een vraag? Twijfel niet en neem contact met ons op.
            Ons team reageert meestal binnen een paar uur.
        </p>

        <div class="row">

            <div class="col-md-9 mb-md-0 mb-5">
                <form id="contact-form" name="contact-form" method="POST">
                    @csrf

                    <div class="row">

                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="name" class="h3">Jouw naam</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                <label for="email" class="h3">Jouw e-mail</label>
                                <input type="text" id="email" name="email" class="form-control">

                            </div>
                        </div>

                    </div>

                    <div class="space space--20"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                <label for="subject" class="h3">Onderwerp</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="space space--20"></div>

                    <div class="md-form">
                        <label for="message" class="h3">Jouw bericht</label>
                        <textarea type="text" id="message" name="message" rows="4"
                                  class="form-control md-textarea"></textarea>
                    </div>

                    <div class="space space--20"></div>

                    <div class="text-center text-md-left">
                        <button type="submit" class="btn btn-primary btn-lg text-white">Verstuur</button>
                    </div>

                </form>
            </div>

            <div class="col-md-3 text-center">
                <ul class="list-unstyled mb-0">
                    <li><i class="fas fa-map-marker-alt fa-2x"></i>
                        <h6>
                            JF-kennedylaan 32<br>
                            1234 BB<br>
                            Maastricht
                        </h6>
                    </li>

                    <li><i class="fas fa-phone mt-4 fa-2x"></i>
                        <h6>+ 01 234 567 89</h6>
                    </li>

                    <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                        <h6>infomaildegraaf@gmail.com</h6>
                    </li>
                </ul>
            </div>

        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
@endsection
