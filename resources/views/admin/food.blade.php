@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-between">
            <h1>Gerechten beheer</h1>

            <a href="{{ url('/beheer/gerechten/toevoegen') }}">
                <button class="btn btn-success">
                    Gerecht toevoegen
                </button>
            </a>

        </div>

        @foreach($mainCourses as $mainCourse)
            <table class="table">
                <tr>
                    <th colspan="2" ><h3>{{$mainCourse->name}}</h3></th>
                </tr>
                @foreach($subCourses as $subCourse)
                    @if($subCourse->mainCourse->name === $mainCourse->name)
                        <tr>
                            <th colspan="2">
                                {{ $subCourse->name }}
                            </th>
                        </tr>
                        @foreach ($products as $product)
                            @if($product->subCourse->name === $subCourse->name)
                                <tr>
                                    <td class="w-100">{{$product->name}} - {{$product->price}} </td>
                                    <td class="float-right"><a href="gerechten/delete/{{$product->id}}">Verwijder</a></td>



                                </tr>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </table>
        @endforeach


    </div>
@endsection
