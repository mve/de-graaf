@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-6 card-container scale-animation">
                <a href="{{ url('/beheer/bestellingen/bar') }}" class="card pointer border-top">
                    <div class="row card-content-admin-container">
                        <div class="col-9 card-content-admin">
                            <h3>Bar</h3>
                        </div>
                        <div class="col-3 icon-container">
                            <h1 class="icon-large"><i class="fas fa-glass-martini-alt"></i></h1>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 card-container scale-animation">
                <a href="{{ url('/beheer/bestellingen/keuken') }}" class="card pointer border-top">
                    <div class="row card-content-admin-container">
                        <div class="col-9 card-content-admin">
                            <h3>Keuken</h3>
                        </div>
                        <div class="col-3 icon-container">
                            <h1 class="icon-large"><i class="fas fa-utensils"></i></h1>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="space space--60"></div>

        <div class="row w-100 mb-3">
            <h1 class="float-left">Admin Bestellingen</h1>
            {{-- Doormiddel van de volgende button wordt de gebruiker doorgestuurd naar de order aanmaken pagina --}}
            <button type="button" onclick="window.location='{{ url("/beheer/createOrder") }}'"
                    class="btn btn-success ml-auto"><i class="fa fa-plus" aria-hidden="true"></i> Bestelling aanmaken
            </button>
        </div>
        {{-- In de volgende tabel loopen we door alle bestellingen die in onze database staan --}}
        <table class="table">
            <tr>
                <th class="d-lg-none" colspan="3">Bestellingen</th>
                <th class="d-none d-lg-table-cell">Datum</th>
                <th class="d-none d-lg-table-cell">Product</th>
                <th class="d-none d-lg-table-cell">Hoeveelheid</th>
                <th class="d-none d-lg-table-cell">Bon nummer</th>
                <th class="d-none d-lg-table-cell">Tafel</th>
                <th class="d-none d-lg-table-cell">Actie</th>
            {{-- Doormiddel van deze foreach loopen we alle bestellingen in de database --}}
            @foreach($unsortedorders as $order)
                <tr>
                    <td class="d-none d-lg-table-cell">{{$order->created_at}}</td>
                    <td class="d-none d-lg-table-cell">
                        {{$order->product->name}}
                    </td>
                    <td class="d-lg-none"><b>Product: </b>{{$order->product->name}}</td>

                    <td class="d-lg-none"><b>Bon nummer:<br></b>{{$order->receipt_id}}
                    </td>
                    <td class="d-none d-lg-table-cell">
                        {{$order->quantity}}
                    </td>
                    <td class="d-none d-lg-table-cell">
                        {{$order->receipt_id}}
                    </td>
                    <td class="d-none d-lg-table-cell">
                        @foreach($order->receipt->reservation->tables as $table)
                            {{$table->id}}
                        @endforeach
                    </td>
                    <td>
                        {{-- Hier wordt de deleteOrder functie aangeroepen en wordt de order id meegegeven --}}
                        <a href="{{action('OrderController@deleteOrder', $order->id)}}">
                            <button class="btn btn-danger button__delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">{!! $unsortedorders->links()!!}</div>
        </div>
    </div>
@endsection
