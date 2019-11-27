@extends('layouts.app')

@section('content')

    <div class="background-image d-flex align-items-center">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="hero-section col-md-6">
                    <h1 class="title text-white">Restaurant De Graaf</h1>
                    <p class="text-white">
                            Bij restaurant de graaf kun je gezellig eten, Je hebt de keuze uit verschillende a la carte gerechten. Bij ons kun je terecht voor zowel de lunch als voor het diner!
                    </p>

                </div>
            </div>
        </div>
    </div>

    <div class="space space--50"></div>

    <div class="container">

        <h2 class="text-center">Eten</h2>
        <div class="row"
             style="background-color: white; box-shadow: 1px 3px 6px 0 rgba(0, 0, 0, 0.1);">
            <div class="col-md-6" style="padding: 20px; display: flex; align-self: center; flex-direction: column;">
                <h2>Kom eten bij De Graaf</h2>
                <p>Voor een lunch of diner ben je bij de Graaf aan het juiste adres, Bij restaurant de Graaf kun je zowel alleen als met grote groepen terecht.</p>
            </div>
            <div class="col-md-6"
                 style="background: url('../images/dinner.jpg') no-repeat bottom; background-size: cover; min-height: 300px"></div>
        </div>

        <div class="space space--50"></div>

        <h2 class="text-center">Borrel</h2>
        <div class="row"
             style="background-color: white; box-shadow: 1px 3px 6px 0 rgba(0, 0, 0, 0.1);">
            <div class="col-md-6"
                 style="background: url('../images/dinner.jpg') no-repeat bottom; background-size: cover; min-height: 300px"></div>
            <div class="col-md-6" style="padding: 20px; display: flex; align-self: center; flex-direction: column;">
                <h2>Kom eten bij De Graaf</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aperiam eveniet ex exercitationem hic vel.
                    Aperiam aut dolor exercitationem, explicabo illo laborum minima praesentium quaerat recusandae sint
                    sit totam, vero voluptas.</p>
            </div>
        </div>

    </div>

@endsection
