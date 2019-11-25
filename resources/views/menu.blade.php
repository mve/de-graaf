@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Menu</h1>

        <h2>Voorgerechten</h2>
        @foreach ($products as $product)
            @if($product->main_course === 'Voorgerecht')
                <div>
                    {{ $product->name }}
                </div>
            @endif
        @endforeach

        <h2>Hoofdgerechten</h2>
        @foreach ($products as $product)
            @if($product->main_course === 'Hoofdgerecht')
                <div>
                    {{ $product->name }}
                </div>
            @endif
        @endforeach

        <h2>Nagerechten</h2>
        @foreach ($products as $product)
            @if($product->main_course === 'Nagerecht')
                <div>
                    {{ $product->name }}
                </div>
            @endif
        @endforeach

    </div>
@endsection
