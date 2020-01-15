@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row w-100 mb-3">
            <h1 class="float-left">Keuken</h1>
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
                <th class="d-none d-lg-table-cell">Bereid</th>
            {{-- Doormiddel van deze foreach loopen we alle bestellingen in de database --}}
            @foreach($unsortedorders as $order)

                @if($order->product->subcourse->maincourse->id != 16 && $order->prepared != 1)

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
                        <td>
                            {{-- Hier wordt de preparedOrder functie aangeroepen en wordt de order id meegegeven --}}
                            <a href="{{action('OrderController@preparedOrder', $order->id)}}">
                                <button class="btn btn-success"><i class="fas fa-check"></i></button>
                            </a>
                        </td>
                    </tr>
                @endif

            @endforeach
        </table>
    </div>

@endsection
