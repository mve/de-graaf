@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row w-100 mb-3">
            <h1 class="float-left">Admin Orders</h1>
            <button type="button" onclick="window.location='{{ url("/beheer/createOrder") }}'"
                    class="btn btn-success ml-auto"><i class="fa fa-plus" aria-hidden="true"></i> Bestelling aanmaken
            </button>
        </div>
        <table class="table">
            <tr>
                <th class="d-lg-none" colspan="2">Orders</th>
                <th class="d-none d-lg-table-cell">Datum</th>
                <th class="d-none d-lg-table-cell">Product</th>
                <th class="d-none d-lg-table-cell">Hoeveelheid</th>
                <th class="d-none d-lg-table-cell">Bon nummer</th>
                <th class="d-none d-lg-table-cell">Tafel</th>
                <th class="d-none d-lg-table-cell">Actie</th>
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
                        <a href="{{action('OrderController@deleteOrder', $order->id)}}" >
                            <button class="btn btn-danger button__delete">
                                <i class="fa fa-trash"></i>
                            </button>
                        </a>
                    </td>
                    {{--<a href="{{action('YourController@callMeDirectlyFromUrl')}}">Link name/Embedded Button</a>
--}}
                </tr>
            @endforeach
        </table>
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">{!! $unsortedorders->links()!!}</div>
        </div>
    </div>
@endsection
