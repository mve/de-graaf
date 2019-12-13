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
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
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
    <div class="space space--20"></div>

    <div class="contact-location">
        <div class="row">
            <div class="col-sm-6 no-space">
                <div class="google-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2458.1675579046205!2d6.2967344841905994!3d51.96736998586081!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c784c716ae2ee7%3A0xe3665d8a07166e2a!2sGraafschap%20College!5e0!3m2!1sen!2snl!4v1575975408442!5m2!1sen!2snl" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-sm-6 no-space">
                <div class="contact-social-title">
                    <h4>Openingstijden </h4>
                    <ul class="my-5">
                        <li> Maandag: 12:00 - 22:00</li>
                        <li> Dinsdag: 12:00 - 22:00</li>
                        <li> Woensdag: 12:00 - 22:00</li>
                        <li> Donderdag: 12:00 - 22:00</li>
                        <li> Vrijdag: 12:00 - 22:00</li>
                        <li> Zaterdag: 12:00 - 22:00</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
