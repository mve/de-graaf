@extends('layouts.app')

@section('content')
    <div class="container">

        <h1>Bestelling aanmaken</h1>

        <div class="row">
            <form method="POST"  class="w-100" action="">
                @csrf
                <dishes-component v-bind:unsortedreservations='@json($unsortedreservations)'></dishes-component>
            </form>
        </div>
    </div>
@endsection
